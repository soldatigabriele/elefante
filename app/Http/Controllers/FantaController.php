<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Logo;
use App\Fanta;
use App\Colour;
use App\Country;
use App\Flavour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $colours = Colour::all()->pluck('name');
        $countries = Country::all()->pluck('name');
        $capacities = Fanta::get()->unique('capacity')->pluck('capacity');
        $flavours = Flavour::all()->pluck('name');
        $tags = Tag::all()->pluck('name');
        
        // Show some fantas by default
        // $fantas = Fanta::inRandomOrder()->take(10)->get();
        // Session::put(['fantas'=>$fantas]);

        return view('fanta.index')->with(['tags' => $tags, 'capacities'
         => $capacities, 'countries' => $countries, 'colours' => $colours, 'flavours' => $flavours]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colours = Colour::all()->pluck('name');
        $countries = Country::all()->pluck('name');
        $capacities = Fanta::get()->unique('capacity')->pluck('capacity');
        $flavours = Flavour::all()->pluck('name');
        $tags = Tag::all()->pluck('name');

        return view('fanta.create')->with(['tags' => $tags, 'capacities'
         => $capacities, 'countries' => $countries, 'colours' => $colours, 'flavours' => $flavours]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fanta = Fanta::create([
            'year' => $request->year,
        ]);

        $fanta->logo_id = ($request->logo === 'all')? 99 : $request->logo;
        
        $fanta->capacity = $request->capacity;

        $colours = explode(',', $request->colours);
        foreach($colours as $c){
            $colour = Colour::where('name', $c)->first();
            if(!$colour){
                $colour = Colour::create(['name' => $c]);
            }
            $fanta->colours()->sync($colour, false);
        }

        $tags = explode(',', $request->tags);
        foreach($tags as $t){
            $tag = Tag::where('name', $t)->first();
            if(!$tag){
                $tag = Tag::create(['name' => $t]);
            }
            $fanta->tags()->sync($tag, false);
        }

        $country = Country::where('name', $request->country)->first();
        if(!$country){
            $country = Country::create(['name' => $request->country]);
        }
        $country->fantas()->save($fanta);

        $flavour = Flavour::where('name', $request->flavour)->first();
        if(!$flavour){
            $flavour = Flavour::create(['name' => $request->flavour]);
        }
        $flavour->fantas()->save($fanta);

        return redirect(route('images.create', $fanta));
        // return back()->with(['success' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Fanta  $fanta
     * @return \Illuminate\Http\Response
     */
    public function show(Fanta $fanta)
    {
       $colours = Colour::all()->pluck('name');
        $countries = Country::all()->pluck('name');
        $capacities = Fanta::get()->unique('capacity')->pluck('capacity');
        $flavours = Flavour::all()->pluck('name');
        $tags = Tag::all()->pluck('name');

        return view('fanta.show')->with(['fanta' => $fanta, 'tags' => $tags, 'capacities'
         => $capacities, 'countries' => $countries, 'colours' => $colours, 'flavours' => $flavours]);
        // return view('fanta.edit')->with(['fanta' => $fanta]);   
    }

    /**
     * Perform a research.
     *
     * @param  App\Fanta  $fanta
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $fantas = Fanta::all();
        // LOGO
        $logo = ($request->logo);
        if($logo !== 'all'){
            $fantas_logo = Fanta::where('logo_id', $logo)->get();
            if($fantas_logo->count()){
                $fantas = $fantas->intersect($fantas_logo);
            }
        }

        // YEAR
        $fantas_year = Fanta::where('year', $request->year)->get();
        if($fantas_year->count()){
            $fantas = $fantas->intersect($fantas_year);
        }

        // COUNTRY
        $countries = explode(',',$request->country);
        if($countries[0]){
            $countries_ids = [];
            foreach($countries as $country){
                $country = Country::where('name', $country)->first();
                $countries_ids[] = $country->id;
            }
            $fantas_country = Fanta::whereIn('country_id', $countries_ids)->get();
            if($fantas_country->count()){
                $fantas = $fantas->intersect($fantas_country);
            }
        }


        // FLAVOUR
        $flavours = explode(',',$request->flavour);
        if($flavours[0]){
            $flavours_ids = [];
            foreach($flavours as $flavour){
                $flavour = Flavour::where('name', $flavour)->first();
                $flavours_ids[] = $flavour->id;
            }
            $fantas_flavour = Fanta::whereIn('flavour_id', $flavours_ids)->get();
            if($fantas_flavour->count()){
                $fantas = $fantas->intersect($fantas_flavour);
            }
        }

        // TAGS
        $tags = explode(',',$request->tags);
        if($tags[0]){
            $tags_ids = [];
            foreach($tags as $tag){
                $tag = Tag::where('name', $tag)->first();
                $tags_ids[] = $tag->id;
            }
            $fantas_tags =  Fanta::whereHas('tags', function($q) use($tags_ids) {
                $q->whereIn('tags.id', $tags_ids);
            })->get();
            if($fantas_tags->count()){
                $fantas = $fantas->intersect($fantas_tags);
            }
        }

        // COLOURS
        $colours = explode(',',$request->colours);
        if($colours[0]){
            $colours_ids = [];
            foreach($colours as $colour){
                $colours_ids[] = Colour::where('name', $colour)->first()->id;
            }
            $fantas_colours = Fanta::whereHas('colours', function($q) use($colours_ids) {
                $q->whereIn('colours.id', $colours_ids);
            })->get();
            if($fantas_colours->count()){
                $fantas = $fantas->intersect($fantas_colours);
            }
        }

        // CAPACITY
        // $fantas_capacity = Fanta::where('capacity', $request->capacity)->get();
        $capacity = explode(',',$request->capacity);
        if($capacity[0]){
            $fantas = $fantas->intersect($fantas_capacity);
        }

        return view('fanta.results')->with(['fantas' => $fantas]);
        // return redirect()->back()->with('fantas', [$fantas])->withInput();
        // return view('fanta.index')->with('fantas', $fantas)->withInput($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Fanta  $fanta
     * @return \Illuminate\Http\Response
     */
    public function edit(Fanta $fanta)
    {
        $colours = Colour::all()->pluck('name');
        $countries = Country::all()->pluck('name');
        $capacities = Fanta::get()->unique('capacity')->pluck('capacity');
        $flavours = Flavour::all()->pluck('name');
        $tags = Tag::all()->pluck('name');

        return view('fanta.edit')->with(['fanta' => $fanta, 'tags' => $tags, 'capacities'
         => $capacities, 'countries' => $countries, 'colours' => $colours, 'flavours' => $flavours]);
        // return view('fanta.edit')->with(['fanta' => $fanta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Fanta  $fanta
     * @return \Illuminate\Http\Response
     */
    public function update(Fanta $fanta, Request $request)
    {

        $country = Country::where('name', $request->country)->first();
        if(!$country){
            $country = Country::create(['name' => $request->country]);
        }
        $country->fantas()->save($fanta);

        $flavour = Flavour::where('name', $request->flavour)->first();
        if(!$flavour){
            $flavour = Flavour::create(['name' => $request->flavour]);
        }
        $flavour->fantas()->save($fanta);
        
        $fanta->logo_id = $request->logo;
        $fanta->capacity = $request->capacity;
        $fanta->year = $request->year;
        $fanta->save();

        $country->fantas()->save($fanta);
        $flavour->fantas()->save($fanta);

        $colours = explode(',', $request->colours);
        if($colours[0]){
            $colours_ids = [];
            foreach($colours as $c){
                $colour = Colour::where('name', $c)->first();
                if(!$colour){
                    $colour = Colour::create(['name' => $c]);
                }
                $colours_ids[] = $colour->id;
            }
        $fanta->colours()->sync($colours_ids, true);
        }

        $tags = explode(',', $request->tags);
        if($tags[0]){
            $tags_ids = [];
            foreach($tags as $t){
                $tag = Tag::where('name', $t)->first();
                if(!$tag){
                    $tag = Tag::create(['name' => $t]);
                }
                $tags_ids[] = $tag->id;
            }
        $fanta->tags()->sync($tags_ids, true);
        }

        return back()->with('status', 'Fanta updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Fanta  $fanta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fanta $fanta)
    {
        //
    }
}

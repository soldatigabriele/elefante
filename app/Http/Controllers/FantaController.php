<?php

namespace App\Http\Controllers;

use App\Fanta;
use App\Colour;
use App\Country;
use App\Flavour;
use App\Tag;
use Illuminate\Http\Request;

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
        $flavours = Flavour::all()->pluck('name');
        $tags = Tag::all()->pluck('name');

        return view('index-fanta')->with(['tags' => $tags, 'countries' => $countries, 'colours' => $colours, 'flavours' => $flavours]);
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
        $flavours = Flavour::all()->pluck('name');
        $tags = Tag::all()->pluck('name');

        return view('create-fanta')->with(['tags' => $tags, 'countries' => $countries, 'colours' => $colours, 'flavours' => $flavours]);
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
        // foreach($generals as $general){
        //     $t = Tag::create(['name'=>$general]);
        //     $t->setGroup('Generals');
        //     $fanta->tag($t->name);
        // }

        $colours = explode(',', $request->colours);
        foreach($colours as $c){
            $colour = Colour::where('name', $c)->first();
            if(!$colour){
                $colour = Colour::create(['name' => $c]);
                $fanta->colours()->sync($colour, false);
                // dump($fanta->colours()->pluck('name'));
            }
        }

        $tags = explode(',', $request->tags);

        foreach($tags as $t){
            $tag = Tag::where('name', $t)->first();
            if(!$tag){
                $tag = Tag::create(['name' => $t]);
                $fanta->tags()->sync($tag, false);
            }
        }
        $country = Country::where('name', $request->country)->first();
        if(!$country){
            $country = Country::create(['name' => $request->country]);
        }

        $flavour = Flavour::where('name', $request->flavour)->first();
        if(!$flavour){
            $flavour = Flavour::create(['name' => $request->flavour]);
        }

        $country->fantas()->save($fanta);
        $flavour->fantas()->save($fanta);

        // attach colour/country
        // $tags = $request->get('tags');
        // $fanta->retag(explode(',', $request->tags));

        return back()->with(['success' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Fanta  $fanta
     * @return \Illuminate\Http\Response
     */
    public function show(Fanta $fanta)
    {
        //
    }

    /**
     * Perform a research.
     *
     * @param  App\Fanta  $fanta
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Fanta  $fanta
     * @return \Illuminate\Http\Response
     */
    public function edit(Fanta $fanta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Fanta  $fanta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fanta $fanta)
{
        //
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

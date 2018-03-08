<?php

namespace App\Http\Controllers;

use App\Fanta;
use App\Colour;
use App\Country;
use App\Flavour;
use Illuminate\Http\Request;
// use Conner\Tagging\Model\Tag;

class FantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colours = Colour::all()->pluck('name');
        // $colours = Tag::inGroup('Colours')->get();
        $countries = Country::all()->pluck('name');
        $flavours = Flavour::all()->pluck('name');
        // $tags = Fanta::existingTags()->pluck('name');

        return view('create-fanta')->with(['tags' => $tags, 'countries' => $countries, 'colours' => $colours, 'flavours' => $flavours]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $r
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {

        $fanta = Fanta::create([
            'year' => $r->year,
        ]);

        $colours = explode(',', $r->colour);
        foreach($colours as $colour){
            $t = Tag::create(['name'=>$colour]);
            dump($t->name);
            $t->setGroup('Colours');
            dump('setted');
            $fanta->tag($t->name);
            dump($fanta);
        }


        $flavours = explode(',', $r->flavour);
        foreach($flavours as $flavour){
            $t = Tag::create(['name'=>$flavour]);
            $t->setGroup('Flavours');
            $fanta->tag($t->name);
        }

        $countries = explode(',', $r->country);
        foreach($countries as $country){
            $t = Tag::create(['name'=>$country]);
            $t->setGroup('Countries');
            $fanta->tag($t->name);
        }

        $generals = explode(',', $r->tags);
        foreach($generals as $general){
            $t = Tag::create(['name'=>$general]);
            $t->setGroup('Generals');
            $fanta->tag($t->name);
        }

        // $colour = Colour::where('name', $r->colour)->first();
        // if(!$colour){
        //     $colour = Colour::create(['name'=>$r->colour]);
        // }

        // $country = Country::where('name', $r->country)->first();
        // if(!$country){
        //     Country::create(['name'=>$r->country]);
        // }

        // $flavour = Flavour::where('name', $r->flavour)->first();
        // if(!$flavour){
        //     Flavour::create(['name'=>$r->flavour]);
        // }

        // attach colour/country

        // $tags = $r->get('tags');

        // $fanta->retag(explode(',', $r->tags));

        return back()->with(['success'=>'success']);
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

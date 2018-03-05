<?php

namespace App\Http\Controllers;

use App\Fanta;
use App\Colour;
use App\Country;
use App\Flavour;
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
        $countries = Country::all()->pluck('name');
        $flavours = Flavour::all()->pluck('name');
        $tags = Fanta::existingTags()->pluck('name');

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
        
        $colour = Colour::where('name', $r->colour)->first();
        if(!$colour){
            Colour::create(['name'=>$r->colour]);
        }
        
        $country = Country::where('name', $r->country)->first();
        if(!$country){
            Country::create(['name'=>$r->country]);
        }

        $flavour = Flavour::where('name', $r->flavour)->first();
        if(!$flavour){
            Flavour::create(['name'=>$r->flavour]);
        }

        $fanta = Fanta::create([
            'year' => $r->year,
        ]);

        // attach colour/country

        $tags = $r->get('tags');

        $fanta->retag(explode(',', $r->tags));

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

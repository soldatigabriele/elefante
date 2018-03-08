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
        // $generals = explode(',', $request->tags);
        // foreach($generals as $general){
        //     $t = Tag::create(['name'=>$general]);
        //     $t->setGroup('Generals');
        //     $fanta->tag($t->name);
        // }

        $colour = Colour::where('name', $request->colour)->first();
        if(!$colour){
            $colour = Colour::create(['name' => $request->colour]);
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

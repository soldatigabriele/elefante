<?php

namespace App\Http\Controllers;

use DB;
use App\Tag;
use App\Logo;
use App\Fanta;
use App\Colour;
use App\Country;
use App\Flavour;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function stats()
    {
        if (!isset($stats)) $stats = new \stdClass();

        $stats->count = Fanta::all()->count();
        $stats->colours = new \StdClass();
        $stats->colours->count = Colour::all()->count();
        $stats->colours->distinct = DB::table('fantas')
                     ->select(DB::raw('count(c.name) as count, c.name'))
                     ->join('colour_fanta as cf', 'cf.fanta_id', '=', 'fantas.id')
                     ->join('colours as c', 'cf.colour_id', '=', 'c.id')
                     ->groupBy('c.name')
                     ->orderByRaw('count(c.name) desc')
                     ->get();

        $stats->tags = new \StdClass();
        $stats->tags->count = Tag::all()->count();
        $stats->tags->distinct = DB::table('fantas')
                    ->select(DB::raw('count(t.name) as count, t.name'))
                    ->join('fanta_tag as tf', 'tf.fanta_id', '=', 'fantas.id')
                    ->join('tags as t', 'tf.tag_id', '=', 't.id')
                    ->groupBy('t.name')
                    ->get();

        $stats->flavours = new \StdClass();
        $stats->flavours->count = FLavour::all()->count();
        $stats->flavours->distinct = DB::table('fantas')
                     ->select(DB::raw('count(fantas.flavour_id) as count, flavours.name'))
                     ->join('flavours', 'fantas.flavour_id', '=', 'flavours.id')
                     ->groupBy('flavour_id')
                     ->get();


        // Find the main colour of the flavours
        $flavour_groups = Fanta::all()->groupBy('flavour_id');
        $stats->flavours->colours= new \StdClass();
        foreach($flavour_groups as $group){
            $colourCount = [];
            $flavour = '';

            $group->each(function($item) use (&$colourCount, &$flavour){
                $flavour = $item->flavour->name;
                $item->colours->each(function($colour) use (&$colourCount) { 
                    $colourCount[$colour->name] = (!isset($colourCount[$colour->name]))? 1 : $colourCount[$colour->name] + 1;
                });
            });
            // Get the most popular colour
            arsort($colourCount);
            $groupColour = collect($colourCount)->keys()->first();
            
            $stats->flavours->colours->$flavour = $groupColour; 
        }

        $flavCollection = collect($stats->flavours->distinct);
        
        $coloursCollection = collect($stats->flavours->colours);
        $stats->flavours->colours = $coloursCollection->toArray();
        
        foreach($stats->flavours->distinct as $d){
            $colour = $stats->flavours->colours[$d->name];
            $d->colour = $colour; 
        }

        $stats->flavours->distinct = $flavCollection->sortBy('colour')->toArray();
        
        // dump(collect($stats->flavours->colours), collect($stats->flavours->distinct));
        
        $colours = new \StdClass();
        $colours->group = DB::table('fantas')
            ->select(DB::raw('count(c.name) as count, c.name'))
            ->join('colour_fanta as cf', 'cf.fanta_id', '=', 'fantas.id')
            ->join('colours as c', 'cf.colour_id', '=', 'c.id')
            ->groupBy('c.name')
            ->orderByRaw('count(c.name) desc')
            ->get();
                
        $stats->countries = new \StdClass();
        $stats->countries->count = Country::all()->count();
        $stats->countries->distinct = DB::table('fantas')
            ->select(DB::raw('count(year) as count, countries.name'))
            ->join('countries', 'fantas.country_id', '=', 'countries.id')
            ->groupBy('country_id')
            ->get();


        $stats->years = new \StdClass();
        $stats->years = DB::table('fantas')
            ->select(DB::raw('count(year) as count, year'))
            ->groupBy('year')
            ->get();

        $stats->capacities = new \StdClass();
        $stats->capacities = DB::table('fantas')
            ->select(DB::raw('count(capacity) as count, capacity'))
            ->groupBy('capacity')
            ->get();

        $stats->logos = new \StdClass();
        $stats->logos->count = Logo::all()->count() -1;
        $stats->logos->distinct = DB::table('fantas')
            ->select(DB::raw('count(fantas.logo_id) as count, logos.name'))
            ->join('logos', 'fantas.logo_id', '=', 'logos.id')
            ->groupBy('logo_id')
            ->get();

        return view('fanta.stats')->with('stats', $stats);

    }
}

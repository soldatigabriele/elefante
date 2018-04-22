<?php

namespace App\Http\Controllers;

use DB;
use App\Tag;
use App\Logo;
use App\Colour;
use App\Country;
use App\Flavour;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function stats()
    {
        if (!isset($stats)) $stats = new \stdClass();

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
                    ->select(DB::raw('count(t.name) count, t.name'))
                    ->join('fanta_tag as tf', 'tf.fanta_id', '=', 'fantas.id')
                    ->join('tags as t', 'tf.tag_id', '=', 't.id')
                    ->groupBy('t.name')
                    ->get();

        $stats->flavours = new \StdClass();
        $stats->flavours->count = FLavour::all()->count();
        $stats->flavours->distinct = DB::table('fantas')
                     ->select(DB::raw('count(fantas.flavour_id) count, flavours.name'))
                     ->join('flavours', 'fantas.flavour_id', '=', 'flavours.id')
                     ->groupBy('flavour_id')
                     ->get();

        $stats->countries = new \StdClass();
        $stats->countries->count = Country::all()->count();
        $stats->countries->distinct = DB::table('fantas')
            ->select(DB::raw('count(fantas.country_id) count, countries.name'))
            ->join('countries', 'fantas.country_id', '=', 'countries.id')
            ->groupBy('country_id')
            ->get();

        $stats->logos = new \StdClass();
        $stats->logos->count = Logo::all()->count() -1;
        $stats->logos->distinct = DB::table('fantas')
            ->select(DB::raw('count(fantas.logo_id) count, logos.name'))
            ->join('logos', 'fantas.logo_id', '=', 'logos.id')
            ->groupBy('logo_id')
            ->get();
// dump($stats);
        return view('fanta.stats')->with('stats', $stats);

    }
}

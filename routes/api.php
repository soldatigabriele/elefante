<?php

use App\Tag;
use App\Fanta;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('/tags', function (Request $request) {
    Log::channel('api')->info(['ip' => $request->ip(), 'request' => $request->toArray()]);
    return Tag::inRandomOrder()->take($request->number ?? 1)->pluck('name');
});

Route::get('/year/{year}', function (Request $request, $year) {
    Log::channel('api')->info(['ip' => $request->ip(), 'request' => $request->toArray()]);
    $fanta = Fanta::where('year', $year)->inRandomOrder()->first() ?? Fanta::inRandomOrder()->first();
    return JsonResponse::create([
        'country' => $fanta->country->name,
        'colour' => $fanta->getColours(),
    ]);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Logo;
use App\Fanta;
use App\Colour;
use App\Country;
use App\Flavour;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    
    /**
     * Create the form to upload the images.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPreview(Fanta $fanta)
    {
        return view('fanta.images.preview-create')->with(['fanta' => $fanta]);
    }


    /**
     * Create the form to upload the images.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createSides(Fanta $fanta)
    {
        return view('fanta.images.sides-create')->with(['fanta' => $fanta]);
    }

    /**
     * Store the images.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePreview(Fanta $fanta, Request $request)
    {

        // store the preview and redirect to create sides
        // $image = $request->file('file');
        // $imageName = time().$image->getClientOriginalName();
        // $image->move(public_path('images'),$imageName);
        // return response()->json(['success'=>$imageName]);
        
        return redirect(route('preview.create', $fanta));

    }

    /**
     * Store the images.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSides(Fanta $fanta, Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        return response()->json(['success'=>$imageName]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Logo;
use App\Fanta;
use App\Colour;
use App\Country;
use App\Flavour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $directory = storage_path('app/previews/'.$fanta->id);
        $images = File::allFiles($directory);
        foreach($images as $im){

dump($im);
        }
        return view('fanta.images.preview-create')->with(['fanta' => $fanta, 'images' => $images ]);
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
// \Log::info($fanta);
        // store the preview and redirect to create sides
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        Storage::put('images/previews/'.$fanta->id, $image, 'public');
        // $image->move(public_path('images'),$imageName);
        return response()->json(['success'=>$imageName]);
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
        $imageName = $fanta->id.'/'.time().$image->getClientOriginalName();
        Storage::put($imageName, $image, 'public');

        // $image->move(public_path('images'),$imageName);
        return response()->json(['success'=>$imageName]);
    }

    public function deletePreview()
    {
        \Log::info('delete');
        // remove the image
        return response()->json(['status'=>'ok']);
    }

}

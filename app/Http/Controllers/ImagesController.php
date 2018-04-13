<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Logo;
use App\Fanta;
use App\Image;
use App\Colour;
use App\Country;
use App\Flavour;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Im;

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
        // $images = Storage::allFiles('public/images/'.$fanta->id);
        // $paths = [];
        // $images = Storage::files('public/images/'.$fanta->id)
        // foreach($images as $image){
        //     $paths[] = explode('/', $image);
        // }
        $images = $fanta->images;
        $preview = $fanta->preview;
        return view('fanta.images.preview-create')->with(['fanta' => $fanta, 'images' => $images, 'preview' => $preview ]);
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
        $preview = $request->file('file');

        $preview = Im::make($preview);
        $preview->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $preview->crop(250,250);

        $ext = $request->file('file')->getClientOriginalExtension();
        $name = md5($preview->__toString()).'.'.$ext;
        $fanta->preview = $name;
        $fanta->save();
        
        Storage::put('public/images/'.$fanta->id.'/'.$name, $preview->stream());

        return response()->json(['status'=>'success']);
    }


    /**
     * Store the images.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSides(Fanta $fanta, Request $request)
    {

        // store the full_size
        $image = $request->file('file');
        $im = new Image;
        $im->fanta_id = $fanta->id;
        
        $ext = $request->file('file')->getClientOriginalExtension();
        $im->original_name = $request->file('file')->getClientOriginalName().'.'.$ext;
        $im->size = $request->file('file')->getClientSize();
        $name = hash('md5', time().$request->file('file')->getClientOriginalName()).'.'.$ext;
        $im->full_size = $name;
        $im->save();
        
        Storage::putFileAs('public/images/'.$fanta->id, $image, $name);

        // store the side
        $side = Im::make($image)->resize(200, 200)->encode('jpg');
        $name = md5($side->__toString()).'.'.$ext;
        $im->path = $name;
        $im->save();
        Storage::put('public/images/'.$fanta->id.'/'.$name, $side->stream());

        return response()->json(['status'=>'success']);
    }

    //     $image = $request->file('file');
    //     $imageName = $fanta->id.'/'.time().$image->getClientOriginalName();
    //     Storage::put($imageName, $image, 'public');

    //     // $image->move(public_path('images'),$imageName);
    //     return response()->json(['success'=>$imageName]);
    // }

    public function deletePreview()
    {
        \Log::info('delete');
        // remove the image
        return response()->json(['status'=>'ok']);
    }

}

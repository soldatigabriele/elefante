<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Logo;
use App\Fanta;
use App\Image;
use App\Colour;
use App\Country;
use App\Flavour;
// use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
    public function create(Fanta $fanta)
    {
        return view('fanta.images.create')->with(['fanta' => $fanta ]);
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
        $preview->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // $preview->crop(250,250);

        $ext = $request->file('file')->getClientOriginalExtension();
        $name = 'P_'.md5(str_random(10)).'.'.$ext;
        $fanta->preview = $name;
        $fanta->save();
        $save_path = storage_path('app/public/images/'.$fanta->id.'/');
        File::isDirectory($save_path) or File::makeDirectory($save_path, 0777, true, true);

        $preview->save($save_path.'/'.$name, 100);

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
        \Log::info('1');
        $save_path = storage_path('app/public/images/'.$fanta->id.'/');
        File::isDirectory($save_path) or File::makeDirectory($save_path, 0777, true, true);
        // store the full_size
        $image = $request->file('file');
        $im = new Image;
        $im->fanta_id = $fanta->id;
        
        $ext = $request->file('file')->getClientOriginalExtension();
        $im->original_name = $request->file('file')->getClientOriginalName().'.'.$ext;
        $im->original_size = $request->file('file')->getClientSize();
        
        \Log::info('2');
        $full_size_name = 'F_'.md5(str_random(10)).'.'.$ext;
        $im->full_size = $full_size_name;
        // save the compressed image
        $normal_size_name = 'N_'.md5(str_random(10)).'.'.$ext;
        $im->normal_size = $normal_size_name;
        $im->save();
        
        \Log::info('3');
        // store full size
        $full_size = Im::make($image);
        $full_size->save($save_path.'/'.$full_size_name, 90);

        // store normal size
        $normal_size = Im::make($image);
        $normal_size->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $normal_size->save($save_path.'/'.$normal_size_name, 60);        
        
        \Log::info('4');

        return response()->json(['status'=>'success']);
    }

    public function deletePreview()
    {
        \Log::info('delete');
        // remove the image
        return response()->json(['status'=>'ok']);
    }

    // public function update(Fanta $fanta)
    // {
    //     return view('fanta.images.update');
    // }

    public function destroyPreview(Fanta $fanta)
    {
        $image = storage_path('app/public/images/'.$fanta->id.'/'.$fanta->preview);
        File::delete($image);
        $fanta->preview = null;
        $fanta->save();
        return back()->with('status', 'success');
    }

    public function destroySides(Fanta $fanta)
    {
        foreach($fanta->images as $image){
            $fullSize = storage_path('app/public/images/'.$fanta->id.'/'.$image->full_size);
            File::delete($fullSize);
            $normalSize = storage_path('app/public/images/'.$fanta->id.'/'.$image->normal_size);
            File::delete($normalSize);
            $image->delete();
        }
        return back()->with('status', 'success');
    } 
    
    public function destroySide(Fanta $fanta, Image $image)
    {
        $fullSize = storage_path('app/public/images/'.$fanta->id.'/'.$image->full_size);
        File::delete($fullSize);
        $normalSize = storage_path('app/public/images/'.$fanta->id.'/'.$image->normal_size);
        File::delete($normalSize);
        $image->delete();
        return back()->with('status', 'success');
    } 
    
    public function destroyImages(Fanta $fanta)
    {
        $fanta->preview = null;
        $fanta->save();
        foreach($fanta->images as $image){
            $image->delete();
        }

        $to_delete_path = storage_path('app/public/images/'.$fanta->id);
        $success = File::deleteDirectory($to_delete_path);    
        return back()->with('status', $success);
    }

}

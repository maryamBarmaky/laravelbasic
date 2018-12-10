<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Photo;
use Illuminate\Http\Request;


use App\Http\Requests;

class PhotoController extends Controller
{
    public function store( $zip,$street,Request $request)
    {
//        $this->validate($request ,[
//            'photo'=>'required|mimes:jpg,png,bmp '
//        ]);

        // $photo=$this->makePhoto($request->file('photo'));


        $banner=Banner::locatedAt($zip,$street);
        //guard

        if($banner->user_id !== auth()->id()){
            // if($banner->ownedBy(aut)){
            if($request->ajax()){
                return response(['message'=>'nope'],403);
            }
            flash()->error('nope');
            return back();

        }
        $photo=Photo::fromForm($request->file('photo'));
        $banner->addPhoto($photo);

    }

    public function destroy($id)
    {
        $photo=Photo::findOrFail($id);
        $photo->delete();
        return back();
    }
}

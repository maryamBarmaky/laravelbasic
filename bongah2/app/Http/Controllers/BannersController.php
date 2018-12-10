<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Banner;
use App\Photo;
//use Symfony\Component\HttpFoundation\File\UploadedFile;
class BannersController extends Controller
{
    /**
     * BannersController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth',['except'=>['show','index']]);
        //$this->middleware(['auth','aaa'],['except'=>['show','index']]);
       // $user=auth()->user;     baraye hameye funation haye  BannersController kar mikone
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  $countries=\App\Http\Utilities\Country::all();

        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        //validate    model jadid:dakhele BannerRequest validate shod
        //store db
       // Banner::create($request->all());
      $banner=auth()->user()->publish(
            new Banner($request->all())
        );

       // Banner::create($request->all());

        flash()->success('salam','your banner has been create');
        //redirect

        //  return back();
    //    return redirect($banner->zip . '/' . str_replace(' ','-', $banner->street));
          return redirect($banner->path());  //path()  dakel Banner ast
      //  return redirect(banner_path($banner));

    }

    /**
     * Display the specified resource.
     *
     * @param $zip
     * @param $street
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($zip,$street)
    {
        $banner= Banner::locatedAt($zip,$street);
        return view('banners.show',compact('banner'));

    }



//    protected function makePhoto(UploadedFile $file)
//    {
//        return Photo::named($file->getClientOriginalName())->move($file);
//    }
//--------------------------------------------------------
//     public function addPhotos($zip,$street,Request $request){
//         $file=$request->file('file');
//         $name=time().$file->getClientOriginalName();
//         $file->move('banners/photos',$name);
//         $banner=Banner::locatedAt($zip,$street)->first();
//         $banner->photos()->create(['path'=>"/banners/photos/{$name}"]);
//         return 'done';
//     }
//---------------------------------------------------------------


    public function addPhotos( $zip,$street,Request $request)
    {
//        $this->validate($request ,[
//            'photo'=>'required|mimes:jpg,png,bmp '
//        ]);


        $photo=Photo::fromForm($request->file('photo'));
       Banner::locatedAt($zip,$street)->addPhoto($photo);
//       $banner=Banner::locatedAt($zip,$street)
//        $banner->addPhoto($photo);

    }
//----------------------------------------------------------------
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

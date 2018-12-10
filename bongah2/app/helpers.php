<?php


use Illuminate\Http\Request;

function flash($title=NULL, $message=NULL)
{
    $flash=app('App\Http\Flash');

    if(func_num_args()==0){
        return $flash;
    }


    return $flash->info($title,$message);

//    function banner_path(\App\Banner $banner)
//    {
//
//        return $banner->zip . '/' . str_replace(' ','-', $banner->street);
//
//    }
//  function active($path,$active='active')
//  {
//     // return Request::is($path)?? $active;
//      return Request::is($path)? 'active':'';
//  }

}



function active($path,$active='active')
{
    // return Request::is($path)?? $active;
    return Request::is($path)? 'active':'';
}
<?php
namespace App\Http\Controllers\Traits;
use App\Banner;
use Illuminate\Http\Request;
trait AuthorizesUsers
{
    protected function userCreatedbanner($request)
    {
        Banner::where([
            'zip'=>$request->zip,
            'street'=>$request->street,
            'user_id'=>auth()->user()->id
        ])->exists();
    }

    protected function unAuthorized(Request $request)
    {
        if($request->ajax()){
            return response(['message'=>'nope'],403);
        }
        flash()->error('nope');
        return back();

    }
}
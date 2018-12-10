<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }


    public function show()
    {
        $user=auth()->user();
        return view('user.profile', compact('user'));
    }

    public function edit()
    {
        $user=auth()->user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user=auth()->user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',


        ]);

        if (!trim($request->password)) {
            $user->update($request->except('password'));
        } else {
            $user->update($request->all());
        }
        return back();
    }

    public function destroy($id)
    {
       $user=User::find($id);
        $user->delete();

        return back();
    }

}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class InfoController extends Controller
{

    public function __construct()
    {
//        parent::__construct();
    }


    public function index(User $user)
    {

        return view('user.index', compact('user'));

    }

}

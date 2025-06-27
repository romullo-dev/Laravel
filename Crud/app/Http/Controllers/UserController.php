<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index ()
    {
        //carregar a VIEW 
        return view('users.index');
    }
}

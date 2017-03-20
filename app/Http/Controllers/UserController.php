<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
       return view('users.userCreate');

    }

     public function store(Request $request)
     {
        $input = $request->all();
        User::create($input);
        Session::flash('flash_message', 'User successfully added!');
        return redirect('/home');
     }
}

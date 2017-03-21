<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;


class UserController extends Controller
{
    public function home()
    {
     return view('users/home');
    }

    public function adminUser()
    {
     return view('users/userManager');
    }

    public function index(Request $request)
    {
     $users = User::all();
     return view('users.gestionUsuarios', ['list' => $users]);
    }


    public function create(Request $request)
    {
       return view('users.userCreate');

    }

    public function store(Request $request)
    {
       $this->validate($request, [
       'nombres' => 'required | string | max:100',
       'apellidos' => 'required | string | max:100',
       'email' => 'required | email',
       'password' => 'required | string | min:4 | max:64',
       ]);
$input = $request->all();
User::create($input);
Session::flash('flash_message', 'User successfully added!');
return redirect('/');
}

    public function show(Request $request, $id) {

    }

}

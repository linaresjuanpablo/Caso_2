<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;


class UserController extends Controller
{
    public function userHome()
    {
     //$users = User::all();
     //return view('users/userManager',['list' => $users]);
      return view('users/userHome');
     //return view('users/userHome');
    }

    public function adminUser()
    {
     $users = User::all();
     return view('users/userManager',['list' => $users]);

    }

    public function index(Request $request)
    {
     //$users = User::all();
     //return view('users/UserManager', ['list' => $users]);
     return view('users.userHome');
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
       'email' => 'required | email | unique:users,email',
       'password' => 'required | string | min:4 | max:64',
       ]);

       $input = $request->all();
       User::create($input);
       Session::flash('flash_message', 'User successfully added!');

        $users = User::all();
        return view('users/userManager',['list' => $users]);

    }

   public function edit(Request $request, $id)
   {
     try
     {

     $user = User::findOrFail($id);
     return view('users/userEdit', ['data' => $user]);

     }

    catch(ModelNotFoundException $e)
    {
       Session::flash('flash_message', "The User ($id) could not be found to be
       edited!");
       return redirect()->back();
    }
   }


  public function update(Request $request, $id)
  {
    try
    {
      $user = User::findOrFail($id);
      $this->validate($request, [
       'nombres' => 'required | string | max:100',
       'apellidos' => 'required | string | max:100',
       'email' => 'required | email | unique:users,email',
       'password' => 'required | string | min:4 | max:64',
       ]);
      $input = $request->all();
      $user->fill($input)->save();
      Session::flash('flash_message', 'User successfully edited!');
      $users = User::all();
      return view('users/userManager',['list' => $users]);


   }

  catch(ModelNotFoundException $e)
   {
     Session::flash('flash_message', "The User ($id) could not be found to be
     edited!");
     echo "error";
     return redirect()->back();
    }
 }


    public function show(Request $request, $id) {

    }

 public function destroy(Request $request, $id)
 {
  try
  {
    $user = User::findOrFail($id);
    $user->delete();
    Session::flash('flash_message', 'User successfully deleted!');
    $users = User::all();
    return view('users/userManager',['list' => $users]);
  }
  catch(ModelNotFoundException $e)
   {
    Session::flash('flash_message', "The User ($id) could not be found to be
    deleted!");
    return redirect()->back();
   }
  }

}

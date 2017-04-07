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
       Session::flash('flash_message', 'El usuario ha sido agregado exitosamente!');

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
       Session::flash('flash_message', "El Usuario ($id) no ha sido encontrado para editarlo!");
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
       'email' => 'required | email',
       'password' => 'required | string | min:4 | max:64',
       ]);
      $input = $request->all();
      $user->fill($input)->save();
      Session::flash('flash_message', 'La edición de datos fue exitosa!');
      $users = User::all();
      return view('users/userManager',['list' => $users]);


   }

  catch(ModelNotFoundException $e)
   {
     Session::flash('flash_message', "El usuario con id ($id) no puedo ser encontrado para la actualización de datos!");
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
    Session::flash('flash_message', 'Usuario eliminado correctamente!');
    $users = User::all();
    return view('users/userManager',['list' => $users]);
  }
  catch(ModelNotFoundException $e)
   {
    Session::flash('flash_message', "El Usuario con ($id) no pudo ser encontrado para la eliminación de datos!");
    return redirect()->back();
   }
  }

}

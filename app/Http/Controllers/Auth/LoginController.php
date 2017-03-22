<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  //
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function redirectTo()
    {
       // echo "hola";
    return 'users/userManager';

    /*   $user = Auth::user();
    if($user->tipo_usuario=='ADMINISTRADOR')
      return 'users/home';
    else
        return 'paciente/pacientes';
         //return redirect()->route('admin');
         */
  }

  protected function logout(Request $request){
    $this->guard()->logout();
    $request->session()->flush();
    $request->session()->regenerate();

    return redirect()->route('login');

}

}

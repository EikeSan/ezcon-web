<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //protected $redirectTo = '/home';


    public function authenticated($request, $user)
    {
      switch ($user->type) {
        case 'admin':
          return redirect('/home');
          break;

        case 'morador':
          if ($user->sindico == 1) {
            return redirect('/sindico');
          }else {
            return redirect('/morador');
          }
          break;

        case 'sindico':
          return redirect('/sindico');
          break;

        case 'funcionario':
          return redirect('/funcionario');
          break;

        default:
          return redirect('/');
          break;
      }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

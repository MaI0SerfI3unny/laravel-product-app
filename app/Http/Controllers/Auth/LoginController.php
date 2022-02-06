<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     public function redirectTo() {
     $role = Auth::user()->role;
     switch ($role) {
       case 'admin':
         return '/admin';
         break;
       case 'user':
         return '/';
         break;
       default:
         return '/';
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

    public function auth(Request $request,$user)
    {
      if ($user->hasRole('admin')) {
        return redirect(route('admin.home'));
      }
      return redirect(route('/'));

    }
}

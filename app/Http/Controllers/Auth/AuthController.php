<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;

class AuthController extends \App\Http\Controllers\Controller {
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

    //use AuthenticatesUsers;





    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
        Auth::user()->AauthAcessToken()->delete();
        Auth::logout();
        return redirect('login');
    }

    function login(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:1'
        ]);
       

        if (Auth::attempt(['email' => request('email'), 'status' => 1, 'password' => request('password')])) {

            $user = Auth::user();
            $user->last_login = Carbon::now();
            $user->save();
            $user->token = $user->createToken('authToken')->accessToken;
            
             auth('web')->login(  $user);
              return response()->json($user);
            
        } else {
               return response()->json(['error' => 'Data is not correct.'.User::count()], 401);
        }
    }
        function signup(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:1'
        ]);
       
         $u = new User();
         $u->name = request('name');
         $u->email = request('email');
         $u->password = bcrypt(request('password'));
         $u->save();
         
        if (Auth::attempt(['email' => request('email'),'password' => request('password')])) {

            $user = Auth::user();
            $user->last_login = Carbon::now();
            $user->save();
            $user->token = $user->createToken('authToken')->accessToken;
             auth('web')->login(  $user);
            return response()->json($user);
            
        } else {
               return response()->json(['error' => 'Data is not correct.'.User::count()], 401);
        }
    }
    
  
  

}

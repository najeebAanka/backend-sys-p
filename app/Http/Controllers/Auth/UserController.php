<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;

class UserController extends \App\Http\Controllers\Controller {

    
    function profile(Request $request){
    return response()->json(Auth::user() ,200);
    }
    
  

}

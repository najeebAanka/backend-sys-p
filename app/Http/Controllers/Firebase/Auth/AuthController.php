<?php

namespace App\Http\Controllers\Firebase\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;

class AuthController extends \App\Http\Controllers\Controller {
   
    
    
    function saveToken(Request $request) {
      $user =   auth()->user();
      $user->device_token = $request->token;
      $user->save();
      return response()->json(['token saved successfully.']  ,200);
        
    }
    

    
  
  

}

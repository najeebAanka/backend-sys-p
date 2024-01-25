<?php
  
namespace App\Http\Controllers\LandLord;
  
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Facades\Validator;
  
class HomeController extends \App\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  function createTenant(Request $request){
      
        
            $validator = Validator::make($request->all(), [
            '_name'       => 'required',
            '_domain'      => 'required|unique:domains,domain',
            '_email' => 'required' ,
            '_password' => 'required'
        ]
       );
       if ($validator->fails()) {
            return back()->with('error', $this->failedValidation($validator));;
       }
        
        
        
      
//      
//   $identifier  = new \stdClass();
//   $identifier->name=$request->_name;
//   $identifier->email=$request->_name;
//   $identifier->name=$request->_name;
 //  dd($identifier);
$tenant = Tenant::create();


 $tenant->update([
    'name' => $request->_name, // stored in the `data` JSON column
    'email' => $request->_email , // stored in the dedicated `plan` column (see below)
    'plan' => 'Free'  ,
]);
 
$tenant->name =  $request->_name;
$tenant->email =  $request->_email;
$tenant->save();
 
 
 
 
$tenant->domains()->create(['domain' => $request->_domain.".".env('APP_CENTRAL_DOMAIN')]); 
$tenant->run(function () use ($request) {
     $admin = new User();
  $admin->email = $request->_email;
     $admin->name = $request->_name.' Adminstrator';
  $admin->password = bcrypt( $request->_password);
  $admin->save();
});
 return back()->with('message' , "Account created succesfully"); 
      
  }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
            
       
              return response()->json($user);
            
        } else {
               return response()->json(['error' => 'Data is not correct.'], 401);
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
            return response()->json($user);
            
        } else {
               return response()->json(['error' => 'Data is not correct.'], 401);
        }
    }
    
  
    /** 
     * Write code on Method
     *
     * @return response()
     */

  
    /**
     * Write code on Method
     *
     * @return response()
     */

}
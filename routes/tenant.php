<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

//
//// routes/tenant.php
Route::middleware(['api'])->prefix('api')->group(function () {
   //
    
    
Route::post('backend/async/login', [AuthController::class, 'login']);
Route::post('backend/async/signup', [AuthController::class, 'signup']);
   
   
Route::group(['middleware' => ['auth:api']], function () {
 
    Route::get('remote/v-profile', [UserController::class, 'profile']);   
 
    
});
   
   
});


Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    
  
    
    Route::get('resources/templates/{v}', function ($v) {
    return view('tenant.templates.'.$v);
});



Route::middleware(['auth'  , 'CORS'])->group(function () {
   

    
 Route::post('save-token', [AuthController::class, 'saveToken'])->name('save-token-api');

    
    Route::get('logout', [AuthController::class, 'logout']);
Route::get('crm', function () {
     return view('tenant.pages.crm.leads');
})->name('nav-crm');

Route::get('home', function () {
    return view('tenant.welcome');
});

Route::get('/', function () {
    return view('tenant.welcome');
});


});


Route::get('login', function () {
     return view('tenant.login');
})->name('login');



//Route::post('backend/async/login', [AuthController::class, 'login']);
//Route::post('backend/async/signup', [AuthController::class, 'signup']);


//
//Route::get('fb-send/{title}/{details}', [\App\Http\Controllers\Firebase\Logic\NotificationsController::class, 'sendNotification']);
//
//    
    
    
//    

//    
//    
    
    
    
    
    
    
});


//
//
//Route::group(['middleware' => ['auth:api']], function () {
// 
//    
//    Route::post('save-token', [AuthController::class, 'saveToken'])->name('save-token-api');
//  
//    
//   
//});
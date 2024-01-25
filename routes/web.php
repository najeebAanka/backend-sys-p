<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('backend/async/login', [AuthController::class, 'login']);
//Route::post('backend/async/signup', [AuthController::class, 'signup']);

Route::get('login', function () {
    return view('login');
});



Route::middleware(['auth'  , 'CORS'])->group(function () {
    

    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('home', function () {
    return view('landlord.home');
});
    
    Route::get('accounts', function () {
    return view('landlord.accounts');
});
    Route::post('landlord/new-account',[App\Http\Controllers\LandLord\HomeController::class, 'createTenant']);
    

});


Route::get('/', function () {
    return view('welcome');
});

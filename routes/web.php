<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
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

Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/',[LoginController::class,'store']);

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('register',[RegisterController::class,'store']);

Route::post('logout',[LogoutController::class,'store'])->name('logout');

Route::get('/search/',[LoginController::class,'search'])->name('search');

Route::post('/served',[LoginController::class,'inputServed'])->name('served');
Route::post('/cancelled',[LoginController::class,'inputCancelled'])->name('cancelled');
// Route::get('/', function () {
//     return view('reservations.index');
// });

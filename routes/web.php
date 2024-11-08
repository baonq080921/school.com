<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[AuthController::class,'login']);

// Route Login, Logout
Route::post('login',[AuthController::class,'AuthLogin']);
Route::get('logout',[AuthController::class,'logout']);

//Route forgot password
Route::get('forgot-password',[AuthController::class,'forgotpassword']);
Route::post('forgot-password',[AuthController::class,'PostForgotPassword']);

//Route reset password
Route::get('reset/{token}',[AuthController::class,'reset']);
Route::post('reset/{token}',[AuthController::class,'PostReset']);

Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});


//Authentication user blocking different user enter

Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
});

Route::group(['middleware' => 'teacher'], function(){
    Route::get('teacher/dashboard',[DashboardController::class,'dashboard']);
});

Route::group(['middleware' => 'student'], function(){
    Route::get('student/dashboard',[DashboardController::class,'dashboard']);
});

Route::group(['middleware' => 'parent'], function(){
    Route::get('parent/dashboard',[DashboardController::class,'dashboard']);
});
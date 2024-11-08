<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

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


//Authentication user blocking different user enter

Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('admin/admin/list',[AdminController::class,'list']);
    //ROute for handling add new admin section:
    Route::get('admin/admin/add',[AdminController::class,'add']);
    Route::post('admin/admin/add',[AdminController::class,'insert']);

    // ROute handling edit section:
    Route::get('admin/admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('admin/admin/edit/{id}',[AdminController::class,'update']);

    //Route handling delete section:
    Route::get('admin/admin/delete/{id}',[AdminController::class,'delete']);
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
<?php

use App\Http\Controllers\admincontroller;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\usercontroler;
 
 
 

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
Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});
 
 

Route::get('user/logout',function(){
    session()->flush();
 return redirect('logins');
});

 

Route::get('logout',function(){
    session()->flush();
 return redirect('login');
});

 
 
Route::get('dashboard',[admincontroller::class,'index']);
Route::post('login_check',[admincontroller::class,'login_check']);



//admin profile
Route::get('/adminprofile',[admincontroller::class,'adminprofile']);

//admin profile
Route::get('/editadmin/{id}',[admincontroller::class,'editadmin']);

Route::post('editadmin_check',[admincontroller::class,'editadmin_check']);

// userlist
Route::get('/post',[admincontroller::class,'post']);

Route::get('/post',[admincontroller::class,'getpost']);

Route::post('/post',[admincontroller::class,'addPost']);

Route::get('check_slug',[admincontroller::class,'getslug']);

 

 

  
 


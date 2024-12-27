<?php

use App\Http\Controllers\Dashboard\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\WelcomeContrller;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgetPassword;
use App\Http\Controllers\Dashboard\RolesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/dashboard',
        'as'=>'dashboard.',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...

        //*****************************login******************************************** ************/
        Route::get('login',[AuthController::class,'loginForm'])->name('login.form');
        Route::post('login',[AuthController::class,'login'])->name('login.post');

        Route::post('logout',[AuthController::class,'logout'])->name('logout');

         //******************************Resr password******************************* */
           Route::get('enter/email',[ForgetPassword::class,'enterEmail'])->name('enter.email');
           Route::post('send/code',[ForgetPassword::class,'sendCode'])->name('send.code');
           Route::get('confirm/code/{email}',[ForgetPassword::class,'getconfirmCode'])->name('get.comfirm.code');
           Route::post('confirm/code',[ForgetPassword::class,'confirmCode'])->name('comfirm.code');
           Route::get('new/password/{email}',[ForgetPassword::class,'getNewPassword'])->name('get.new.password');
           Route::post('new/password',[ForgetPassword::class,'newPassword'])->name('new.password');

        //*****************************protected Route******************************************** */
        Route::group(['middleware'=>'auth:admin'],function(){

            //*****************************welcome******************************* */
            Route::get('welcome',[WelcomeContrller::class,'index'])->name('welcome');

              //*****************************Roles Controller******************************* */
              Route::group(['middleware'=>'can:roles'],function(){

                  Route::resource('roles',RolesController::class);
              });
              //*****************************admins Controller******************************* */
              Route::group(['middleware'=>'can:admins'],function(){

                  Route::resource('admins',AdminController::class);
                  Route::get('admins/status/{id}',[AdminController::class,'changeStatus'])->name('admins.status');

              });



        });

    });


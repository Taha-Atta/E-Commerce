<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminController;

use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\WorldController;
use App\Http\Controllers\Dashboard\WelcomeContrller;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgetPassword;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...

        //**************************************login**************************************************/

        Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
        Route::post('login', [AuthController::class, 'login'])->name('login.post');

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        //***************************************End************************************************** */

        //*************************************Resr password******************************************* */
        Route::get('enter/email', [ForgetPassword::class, 'enterEmail'])->name('enter.email');
        Route::post('send/code', [ForgetPassword::class, 'sendCode'])->name('send.code');
        Route::get('confirm/code/{email}', [ForgetPassword::class, 'getconfirmCode'])->name('get.comfirm.code');
        Route::post('confirm/code', [ForgetPassword::class, 'confirmCode'])->name('comfirm.code');
        Route::get('new/password/{email}', [ForgetPassword::class, 'getNewPassword'])->name('get.new.password');
        Route::post('new/password', [ForgetPassword::class, 'newPassword'])->name('new.password');

        //*****************************protected Route******************************************** */

        Route::group(['middleware' => 'auth:admin'], function () {

            //*****************************welcome******************************* */
            Route::get('welcome', [WelcomeContrller::class, 'index'])->name('welcome');

            //*****************************Roles Controller******************************* */
            Route::group(['middleware' => 'can:roles'], function () {

                Route::resource('roles', RolesController::class);
            });

            //***************************************End************************************************** */

            //*****************************admins Controller******************************* */
            Route::group(['middleware' => 'can:admins'], function () {

                Route::resource('admins', AdminController::class);
                Route::get('admins/status/{id}', [AdminController::class, 'changeStatus'])->name('admins.status');
            });

            //***************************************End********************************************************** */

            //**********************************Shipping & Countries************************************************** */

            Route::group(['middleware' => 'can:global_shipping'], function () {
                Route::controller(WorldController::class)->group(function () {

                    Route::prefix('countries')->name('countries.')->group(function () {
                        Route::get('/',                              'getAllCountries')->name('index');
                        Route::get('/{country_id}/governorates',     'getGovsByCountry')->name('governorates.index');
                        Route::get('/change-status/{country_id}',    'changeStatus')->name('status');
                    });

                    Route::prefix('governorates')->name('governorates.')->group(function () {
                        Route::get('/change-status/{gov_id}',       'changeGovStatus')->name('status');
                        Route::put('/shipping-price',               'changeShippingPrice')->name('shipping-price');
                    });
                });
            });

             //*********************************** End Shipping ************************************************** */


        });
    }
);

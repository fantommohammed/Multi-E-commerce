<?php

use Illuminate\Support\Facades\Route;

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


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    route::get('/', function () {
        return view('front.home');
    })->name('home')->middleware('VerifiedUser');

    //all route must be authenticated user and verified
    Route::group(['namespace'=>'Site','middleware'=>['auth','VerifiedUser']],function ()
    {
        Route::get('profile',function (){return 'you are authentificated';});

    });

    //all route must be authenticated user
    Route::group(['namespace'=>'Site','middleware'=>'auth'],function ()
    {
        Route::post('verify-user','VerificationCodeController@verify')->name('verify-user');
        Route::get('verify','VerificationCodeController@getVerifyPage') -> name('get.verification.form');
    });

    Route::group(['namespace'=>'Site','middleware'=>'guest'],function ()
    {
        //guest user
    });

//    Route::get('verify',function(){return view('auth.verification');});


});

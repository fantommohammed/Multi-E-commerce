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

//note that the prefix is admin for all route
Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
      ],function()
        {
            Route::group(['namespace' => 'Dashboard','middleware' => 'auth:admin','prefix'=>'admin'],function()
            {
                Route::get('/','DashboardController@index')->name('admin.dashboard');
                Route::get('logout','LoginController@logout')->name('admin.logout');

                ######################### Begin Settings Routes ########################
                Route::group(['prefix'=>'settings'],function()
                {
                    Route::get('shipping-methods/{type}','SettingsController@editShippingMethods')->name('edit.shipping.methods');
                    Route::put('shipping-methods/{id}','SettingsController@updateShippingMethods')->name('update.shipping.methods');
                });
                ######################### End  Settings Routes  ########################

                ######################### Begin Profile Routes ########################
                Route::group(['prefix'=>'profile'],function()
                {
                    Route::get('edit','ProfileController@editProfile')->name('edit.profile');
                    Route::put('update','ProfileController@updateProfile')->name('update.profile');
                });
                ######################### End  Profile Routes  ########################

                ######################### Begin Main Categoris Routes ########################
                Route::group(['prefix' => 'main_categories'], function () {
                    Route::get('/','MainCategoriesController@index') -> name('admin.maincategories');
                    Route::get('create','MainCategoriesController@create') -> name('admin.maincategories.create');
                    Route::post('store','MainCategoriesController@store') -> name('admin.maincategories.store');
                    Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.maincategories.edit');
                    Route::post('update/{id}','MainCategoriesController@update') -> name('admin.maincategories.update');
                    Route::get('delete/{id}','MainCategoriesController@destroy') -> name('admin.maincategories.delete');
                    Route::resource('category', 'MainCategoriesController');
                });
                ######################### End  Main Categories Routes  ########################

                ######################### Begin sub Categoris Routes ########################
                Route::group(['prefix' => 'sub_categories'], function () {
                    Route::get('/','SubCategoriesController@index') -> name('admin.subcategories');
                    Route::get('create','SubCategoriesController@create') -> name('admin.subcategories.create');
                    Route::post('store','SubCategoriesController@store') -> name('admin.subcategories.store');
                    Route::get('edit/{id}','SubCategoriesController@edit') -> name('admin.subcategories.edit');
                    Route::post('update/{id}','SubCategoriesController@update') -> name('admin.subcategories.update');
                    Route::get('delete/{id}','SubCategoriesController@destroy') -> name('admin.subcategories.delete');
                    Route::resource('category', 'SubCategoriesController');
                });
                ######################### End  sub Categories Routes  ########################

                ######################### Begin brands Routes ########################
                Route::group(['prefix' => 'brands'], function () {
                    Route::get('/','BrandsController@index') -> name('admin.brands');
                    Route::get('create','BrandsController@create') -> name('admin.brands.create');
                    Route::post('store','BrandsController@store') -> name('admin.brands.store');
                    Route::get('edit/{id}','BrandsController@edit') -> name('admin.brands.edit');
                    Route::post('update/{id}','BrandsController@update') -> name('admin.brands.update');
                    Route::get('delete/{id}','BrandsController@destroy') -> name('admin.brands.delete');
                });
                ######################### End  brands Routes  ########################

                ######################### Begin tags Routes ########################
                Route::group(['prefix' => 'tags'], function () {
                    Route::get('/','TagsController@index') -> name('admin.tags');
                    Route::get('create','TagsController@create') -> name('admin.tags.create');
                    Route::post('store','TagsController@store') -> name('admin.tags.store');
                    Route::get('edit/{id}','TagsController@edit') -> name('admin.tags.edit');
                    Route::post('update/{id}','TagsController@update') -> name('admin.tags.update');
                    Route::get('delete/{id}','TagsController@destroy') -> name('admin.tags.delete');
                });
                ######################### End tags Routes  ########################

                ######################### Begin products Routes ########################
                Route::group(['prefix' => 'products'], function () {
                    Route::get('/','ProductsController@index') -> name('admin.products');
                    Route::get('general-information','ProductsController@create') -> name('admin.products.general.create');
                    Route::post('store-general-information','ProductsController@store') -> name('admin.products.general.store');
                });
                ######################### End products Routes  ########################
            });


            Route::group(['namespace' => 'Dashboard','middleware' => 'guest:admin','prefix'=>'admin'],function()
            {
            //    admin.login
                Route::get('login','LoginController@login') ->name('admin.login');
                Route::post('login','LoginController@postlogin') ->name('admin.postlogin');

            });
        });

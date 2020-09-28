<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' =>['auth']],function(){
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function (){

        Route::prefix('employees')->name('employees.')->group(function() {

            Route::post('/create','EmployeeController@create')->name('create');
            Route::post('/store','EmployeeController@store')->name('store');
            Route::get('/{employee}/edit','EmployeeController@edit')->name('edit');
            Route::post('/update/{employee}','EmployeeController@update')->name('update');
            Route::get('/delete/{employee}','EmployeeController@delete')->name('delete');
            Route::get('/{company}', 'EmployeeController@index')->name('index');
        });

        Route::prefix('companies')->name('companies.')->group(function(){
            Route::get('/','CompanyController@index')->name('index');
            Route::get('/create','CompanyController@create')->name('create');
            Route::post('/store','CompanyController@store')->name('store');
            Route::get('/{company}/edit','CompanyController@edit')->name('edit');
            Route::post('/update/{company}','CompanyController@update')->name('update');
            Route::get('/delete/{company}','CompanyController@delete')->name('delete');
            Route::post('/search','CompanyController@search')->name('search');
        });

    });
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register',function(){
    return redirect()->route('login');
});

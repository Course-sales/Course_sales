<?php 
namespace Modules\User\routes;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers'], function () {
    Route::prefix('admin')->group(function() {
        Route::prefix('users')->group(function() {
            Route::get('/', 'UserController@index')->name('admin.users.index');
            
            Route::get('create', 'UserController@create')->name('admin.users.create');
            Route::post('create', 'UserController@store');

            Route::get('edit/{userId}', 'UserController@edit')->name('admin.users.edit');
            Route::post('edit/{userId}', 'UserController@update');

            Route::get('removeRow', 'UserController@removeRow')->name('admin.users.removeRow');
        });
    });

});

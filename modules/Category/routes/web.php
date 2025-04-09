<?php 
namespace Modules\Category\routes;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\Category\src\Http\Controllers'], function () {
    Route::prefix('admin')->group(function() {
        Route::prefix('categories')->group(function() {
            Route::get('/', 'CategoryController@index')->name('admin.categories.index');

            Route::get('create', 'CategoryController@create')->name('admin.categories.create');
            Route::post('create', 'CategoryController@store');

            Route::get('edit/{categoryId}', 'CategoryController@edit')->name('admin.categories.edit');
            Route::post('edit/{categoryId}', 'CategoryController@update');

            Route::get('delete', 'CategoryController@delete')->name('admin.categories.delete');

        });
    });
});

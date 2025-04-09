<?php 
namespace Modules\Teacher\routes;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\Teacher\src\Http\Controllers'], function () {
    Route::prefix('admin')->group(function() {
        Route::prefix('teachers')->group(function() {
            Route::get('/', 'TeacherController@index')->name('admin.teachers.index');
            
            Route::get('create', 'TeacherController@create')->name('admin.teachers.create');
            Route::post('create', 'TeacherController@store');

            Route::get('edit/{userId}', 'TeacherController@edit')->name('admin.teachers.edit');
            Route::post('edit/{userId}', 'TeacherController@update');

            Route::delete('removeRow', 'TeacherController@removeRow')->name('admin.teachers.removeRow');
            Route::post('search', 'TeacherController@search')->name('admin.teachers.search');

        });
    });
});

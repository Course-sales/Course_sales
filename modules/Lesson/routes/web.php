<?php 
namespace Modules\Lesson\routes;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\Lesson\src\Http\Controllers'], function () {
    Route::prefix('admin')->group(function() {
        Route::prefix('lessons')->group(function() {
            Route::get('/{courseId}', 'LessonController@index')->name('admin.lessons.index');

            Route::get('/{courseId}/create', 'LessonController@create')->name('admin.lessons.create');
            Route::post('/{courseId}/create', 'LessonController@store');

            Route::get('/edit/{lessonId}', 'LessonController@edit')->name('admin.lessons.edit');
            Route::post('/edit/{lessonId}', 'LessonController@update');

            Route::delete('delete', 'LessonController@delete')->name('admin.lessons.delete');

            Route::get('/{courseId}/sort', 'LessonController@sort')->name('admin.lessons.sort');
            Route::post('/{courseId}/sort', 'LessonController@handleSort');

            Route::get('/{courseId}/createChapter', 'LessonController@createChapter')->name('admin.lessons.createChapter');
        });
    });
});

Route::group(['namespace' => 'Modules\Lesson\src\Http\Controllers\Clients', 'middleware' => ['auth:students', 'verified', 'user.block']], function () {
    Route::get('/bai-hoc/{slug}', 'LessonController@index')->name('client.lesson.index');
});

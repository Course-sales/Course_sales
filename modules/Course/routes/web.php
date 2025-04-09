<?php 
namespace Modules\Course\routes;
use Illuminate\Support\Facades\Route;
// Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
Route::group(['namespace' => 'Modules\Course\src\Http\Controllers'], function () {
    Route::prefix('admin')->group(function() {
        Route::prefix('courses')->group(function() {
            Route::get('/', 'CourseController@index')->name('admin.courses.index');
            
            Route::get('create', 'CourseController@create')->name('admin.courses.create');
            Route::post('create', 'CourseController@store');

            Route::get('edit/{courseId}', 'CourseController@edit')->name('admin.courses.edit');
            Route::post('edit/{courseId}', 'CourseController@update');

            Route::get('delete', 'CourseController@delete')->name('admin.courses.delete');
        });
    });
});

Route::group(['namespace' => 'Modules\Course\src\Http\Controllers\Clients'], function () {
    Route::get('/', 'CourseController@index')->name('client.course.index');
    Route::get('/khoa-hoc/{slug}', 'CourseController@detail')->name('client.course.detail');
    Route::get('/data/{lessonId}', 'CourseController@trialLesson')->name('client.course.trialLesson');

    // header
    Route::get('/lo-trinh-khoa-hoc', 'CourseController@roadmap')->name('client.course.roadmap');
});

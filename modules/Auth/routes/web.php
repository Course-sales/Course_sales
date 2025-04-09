<?php 
namespace Modules\Auth\routes;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::group(['namespace' => 'Modules\Auth\src\Http\Controllers'], function () {
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Admin\LoginController@login')->name('login');

    Route::get('/logout', 'Admin\LoginController@logout')->name('logout');
});

Route::group(['namespace' => 'Modules\Auth\src\Http\Controllers\Clients'], function () {
    Route::get('/dang-nhap', 'LoginController@showLoginForm')->name('client.login');
    Route::post('/dang-nhap', 'LoginController@login');

    Route::post('/dang-xuat', 'LoginController@logout')->name('client.logout');

    Route::get('/quen-mat-khau', 'LoginController@showFormForgot')->name('client.forgotpassword');
    Route::post('/quen-mat-khau', 'LoginController@handleForgot');

    Route::get('/dat-lai-mat-khau/{token}', 'LoginController@showFormReset')->middleware('guest')->name('password.reset');
    Route::post('/dat-lai-mat-khau', 'LoginController@passwordUpdate')->middleware('guest')->name('client.password.update');

    Route::get('/dang-ky', 'RegisterController@showRegistrationForm')->name('client.register');
    Route::post('/dang-ky', 'RegisterController@register');

    Route::get('/khoa-tai-khoan', 'BlockController@index')->name('client.block');

    Route::get('/email/verify', 'VerifyController@index')->middleware('auth:students')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect()->route('client.course.index');
    })->middleware(['auth:students', 'signed'])->name('verification.verify');

});


 

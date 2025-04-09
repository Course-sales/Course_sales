<?php 
namespace Modules\Student\routes;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\Student\src\Http\Controllers'], function () {
    Route::prefix('admin')->group(function() {
        Route::prefix('students')->group(function() {
            Route::get('/', 'StudentController@index')->name('admin.students.index');
            Route::get('create', 'StudentController@create')->name('admin.students.create');
            Route::post('create', 'StudentController@store');
            Route::get('edit/{studentId}', 'StudentController@edit')->name('admin.students.edit');
            Route::post('edit/{studentId}', 'StudentController@update');
            Route::delete('removeRow', 'StudentController@removeRow')->name('admin.students.removeRow');

            Route::post('search', 'StudentController@search')->name('admin.students.search');

        });
    });
});


Route::group(['namespace' => 'Modules\Student\src\Http\Controllers\Clients', 'middleware' => ['auth:students', 'verified', 'user.block']], function () {
    Route::prefix('tai-khoan')->group(function() {
        Route::get('', 'StudentController@index')->name('client.account.index');
        Route::get('/thong-tin-ca-nhan', 'StudentController@myProfile')->name('client.account.myProfile');
        Route::post('/thong-tin-ca-nhan', 'StudentController@updateMyProfile')->name('client.account.updateMyProfile');
        Route::get('/khoa-hoc', 'StudentController@myCourses')->name('client.account.myCourses');
        Route::get('/danh-sach-don-hang', 'StudentController@myOrders')->name('client.account.myOrders');
        Route::get('/danh-sach-don-hang/{orderId}', 'StudentController@orderDetail')->name('client.account.orderDetail');
        Route::get('/doi-mat-khau', 'StudentController@changePassword')->name('client.account.changePassword');
        Route::post('/doi-mat-khau', 'StudentController@updatePassword');
        Route::get('/thanh-toan/{orderId}', 'CheckoutController@index')->name('client.account.checkout');
        Route::get('/cap-nhat-thanh-toan/{orderId}', 'StudentController@updatePaymentDate')->name('client.account.updatePaymentDate');
        Route::post('/xac-nhan-thanh-toan', 'CheckoutController@confirmCheckout')->name('client.account.confirmCheckout');
    });
    Route::get('/gio-hang', 'StudentController@cart')->name('client.cart');
    Route::post('/them-vao-gio-hang', 'StudentController@addToCart')->name('client.addToCart');
    Route::delete('/xoa-khoi-gio-hang', 'StudentController@removeFromCart')->name('client.removeFromCart');
    Route::post('/cap-nhat-gio-hang', 'StudentController@updateCart')->name('client.updateCart');
    Route::post('/danh-sach-don-hang', 'StudentController@order')->name('client.order');

    Route::post('/coupon/verify', 'CouponController@verify');
    Route::post('/coupon/delete', 'CouponController@delete');



});
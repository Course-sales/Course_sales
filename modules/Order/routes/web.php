<?php 
namespace Modules\Order\routes;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\Order\src\Http\Controllers'], function () {
    Route::prefix('admin')->group(function() {
        Route::prefix('orders')->group(function() {
            Route::get('/', 'OrderController@index')->name('admin.orders.index');
            Route::get('detail/{orderId}', 'OrderController@detail')->name('admin.orders.detail');

            Route::post('search', 'OrderController@search')->name('admin.orders.search');

        });
    });
});

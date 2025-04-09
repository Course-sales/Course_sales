<?php

use Modules\Order\src\Repositories\OrderRepositoryInterface;

function money($number, $currency = 'đ') {
    return $number > 0 ? number_format($number, 0).'đ' : 'Miễn phí';
}

function getHourDuration($second) {
    $value = round($second / 60, 1);
    return $value.'h';
}

function activeMenu($name) {
    return request()->is(trim(route($name, [], false), '/'));
}

function getPaymentDate($orderId) {
    $orderRepo = app(OrderRepositoryInterface::class);
}
<?php
function createCoupon() {
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $res = "";
    for ($i = 0; $i < 20; $i++) {
        $res .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    return $res;
}

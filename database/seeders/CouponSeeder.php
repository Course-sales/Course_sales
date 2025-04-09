<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Student\src\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($index = 1; $index <= 10; $index++) {
            $coupon = new Coupon();
            $coupon->code = createCoupon();
            $coupon->discount_type = rand(0, 1) ? 'percent' : 'value';
            if($coupon->discount_type == 'percent') {
                $coupon->discount_value = rand(10, 40);
            }
            $coupon->save();
        }
    }
}

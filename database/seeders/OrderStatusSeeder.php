<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Order\src\Models\OrderStatus;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderStatus = new OrderStatus();
        $data = [
            ['name' => 'Chờ thanh toán', 'color' => 'warning', 'is_success' => false], 
            ['name' => 'Đã thanh toán' , 'color' => 'success', 'is_success' => true], 
            ['name' => 'Thanh toán thất bại', 'color' => 'danger', 'is_success' => false], 
            ['name' => 'Đã hủy thanh toán', 'color' => 'danger', 'is_success' => false]
        ];
        $orderStatus::insert($data);
    }
}

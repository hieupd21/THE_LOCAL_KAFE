<?php

use App\OrderStatus;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create([
            'status_name'=>'Đang xử lí'
        ]);
        OrderStatus::create([
            'status_name'=>'Đang giao'
        ]);
        OrderStatus::create([
            'status_name'=>'Đã giao'
        ]);
        OrderStatus::create([
            'status_name'=>'Bị hủy'
        ]);
    }
}

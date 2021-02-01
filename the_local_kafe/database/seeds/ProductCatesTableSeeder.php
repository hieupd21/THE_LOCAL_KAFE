<?php

use App\ProductCate;
use Illuminate\Database\Seeder;

class ProductCatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCate::create([
            'cate_name'=>'LUCKY GOAT'
        ]);
        ProductCate::create([
            'cate_name'=>"FIVE SENCES"
        ]);
        ProductCate::create([
            'cate_name'=>'METROPOLIS'
        ]);
        ProductCate::create([
            'cate_name'=>'REVO'
        ]);
    }
}

<?php

use App\ArticleCate;
use Illuminate\Database\Seeder;

class ArticleCatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleCate::create([
            'cate_name'=>'CHUYỆN CÀ PHÊ'
        ]);
        ArticleCate::create([
            'cate_name'=>'CÔNG NGHỆ'
        ]);
        ArticleCate::create([
            'cate_name'=>'ĐỜI SỐNG'
        ]);
        ArticleCate::create([
            'cate_name'=>'THẦN TƯỢNG'
        ]);
        ArticleCate::create([
            'cate_name'=>'KINH TẾ'
        ]);
    }
}

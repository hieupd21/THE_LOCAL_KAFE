<?php

use App\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(rand(4, 6), true);
            $slug = Str::slug($title, '-');
            $description = $faker->text(rand(100, 300));
            $content = $faker->text(rand(1000, 2500));
            $cate = $faker->numberBetween($min=1, $max=5);
            Article::create([
                'art_title' => $title,
                'art_slug' => $slug,
                'art_description' => $description,
                'art_content' => $content,
                'art_cate' => $cate
            ]);
        }
    }
}

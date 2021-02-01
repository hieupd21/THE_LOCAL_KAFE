<?php

use App\ProductCate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            ProductCatesTableSeeder::class,
            ArticleCatesTableSeeder::class,
            ProductsTableSeeder::class,
            ArticlesTableSeeder::class,
            StatusTableSeeder::class
        ]);
    }
}

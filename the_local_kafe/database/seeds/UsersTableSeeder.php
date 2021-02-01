<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Juy Hiu',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('hieudn19'),
            'phone'=>'0703928702',
            'role'=>'1'
        ]);
    }
}

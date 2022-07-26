<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'demo',
            'email' => 'demo@example.com',
            'password' => '$2y$10$ZK/ZyrV/O98wrjkZh2yCxOnaUYAZJ4nUJJYAo6SJ10LjcJ7vDdKRi'
        ]);
    }
}

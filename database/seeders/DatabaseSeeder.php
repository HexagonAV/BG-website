<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'buys' => rand(0,200),
        // ]);

        DB::table('reviews')->insert([
                'user_id' => rand(1,26),
                'stars' => rand(1,5),
                'text' => Str::random(100),
                'created_at' => '2022-05-19',
            ]);
    }
}

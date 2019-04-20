<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        for ($i = 0; $i <= 10; $i++) {
            DB::table('like')->insert([
                'photo_id' => rand(1, 5),
                'comment' => Str::random(5),

            ]);
        };
    }
}

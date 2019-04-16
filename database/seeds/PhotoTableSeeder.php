<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
//        factory(\App\Photo::class,30)->create();
        for ($i = 0; $i <= 10; $i++) {
            \App\Photo::create([
                'explanation' => Str::random(5),
                'name' => Str::random(5),
                'picture_path' => Str::random(15),
                'location' => Str::random(7),
                'user_id'=>rand(1,5)

            ]);
        }
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */






}
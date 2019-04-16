<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i <= 10; $i++) {
            \App\User::create([
                'name' => Str::random(10),
                'picture_path' => Str::random(1).'://'.Str::random(7).''.Str::random(7).''.Str::random(7),
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'follow_id' => rand(1,5),
                'photo_id' => rand(1,5),

            ])->markEmailAsVerified();
        };
    }
}

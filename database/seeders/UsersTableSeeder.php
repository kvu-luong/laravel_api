<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $password = Hash::make('doccocaubai');
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        for($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email'=> Str::random(10).'@gmail.com',
                'password' => $password,
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
           'name' => 'Đức',
           'surname' => 'Anh',
           'email' => 'ducdv.user@gmail.com',
           'phone' => '0967814535',
           'code' => '123456',
           'password' => Hash::make('123456')
        ]);
    }
}

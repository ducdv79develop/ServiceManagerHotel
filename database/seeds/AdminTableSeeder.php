<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'role_id' => 1,
            'name' => 'Đức',
            'surname' => 'Văn',
            'email' => 'ducdv.admin@gmail.com',
            'phone' => '0968793103',
            'password' => Hash::make('123456')
        ]);
    }
}

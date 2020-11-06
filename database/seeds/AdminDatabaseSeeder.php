<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'Mohammed Gaber',
            'email'=>'mohammedgaber027@gmail.com',
            'password'=> bcrypt('123456789'),
        ]);
        Admin::create([
            'name'=>'Mohammed Gaber',
            'email'=>'fantommohammed@gmail.com',
            'password'=> bcrypt('123456789'),
        ]);
    }
}

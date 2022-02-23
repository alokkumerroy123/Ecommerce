<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name'=>'admin',
            'phone'=>'017',
            'address'=>'Llmonirhat',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123'),
            'role'=>'admin',
           ]);

         User::create([

            'name'=>'customer',
            'phone'=>'0178',
            'address'=>'Dhaka',
            'email'=>'customer@gmail.com',
            'password'=>Hash::make('1234'),
           
           ]);
    }
}

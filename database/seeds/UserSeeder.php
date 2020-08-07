<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tblusers')->insert(['email'=>'customer@gmail.com','name'=>'customer',
            'password'=> Hash::make('12345'),
            'user_type'=>'customer'
        ]);

        DB::table('tblusers')->insert(['email'=>'agent@gmail.com','name'=>'agent', 'password'=> Hash::make('12345'),
            'user_type'=>'agent'
        ]);
    }
}

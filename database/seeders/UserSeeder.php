<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'username' => 'hongkhanh',
                'account_name'=>'Đỗ Thị Hồng Khánh',                
                'email' => 'hongkhanh@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' =>  bcrypt('ABC12345'),
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
               
            ],

            [
                'username' => 'thuluyen', 
                'account_name'=>'Nguyễn Thị Thu Luyến',
                'email' => 'thuluyen@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' =>  bcrypt('ABC12345'),
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            ],

            [
                'username' => 'thaonguyet',
                'account_name'=>'Nguyễn Lê Thảo Nguyệt',
                'email' => 'thaonguyet@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' =>  bcrypt('ABC12345'),
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
               
            ]
          
        ]);
    }
}

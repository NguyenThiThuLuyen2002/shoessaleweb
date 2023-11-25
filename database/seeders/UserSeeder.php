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
<<<<<<< HEAD
                'name' => 'Hong',
                'email' => 'hong@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('123456'),
=======
                'username' => 'hongkhanh',
                'account_name'=>'Đỗ Thị Hồng Khánh',                
                'email' => 'hongkhanh@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' =>  bcrypt('ABC12345'),
>>>>>>> origin/login
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
               
            ],

            [
<<<<<<< HEAD
                'name' => 'Thao',
                'email' => 'thao@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('123456'),
=======
                'username' => 'thuluyen', 
                'account_name'=>'Nguyễn Thị Thu Luyến',
                'email' => 'thuluyen@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' =>  bcrypt('ABC12345'),
>>>>>>> origin/login
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            ],

            [
<<<<<<< HEAD
                'name' => 'Thu',
                'email' => 'thu@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('123456'),
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_role' => '2'
            ]
=======
                'username' => 'thaonguyet',
                'account_name'=>'Nguyễn Lê Thảo Nguyệt',
                'email' => 'thaonguyet@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' =>  bcrypt('ABC12345'),
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
               
            ]
          
>>>>>>> origin/login
        ]);
    }
}

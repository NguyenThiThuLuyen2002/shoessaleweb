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
                'name' => 'khanhdo',
                'email' => 'hongkhanh@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' =>  bcrypt('ABC12345'),
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_role' => 1,  
                'google_id' => null             
            ],

            [
                'name' => 'thaonguyet',
                'email' => 'thaonguyet@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' =>  bcrypt('ABC12345'),
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_role' => 2,  
                'google_id' => null             
            ]

            
        ]);
    }
}

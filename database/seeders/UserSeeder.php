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
                'avt' => 'https://i0.wp.com/thatnhucuocsong.com.vn/wp-content/uploads/2023/02/Hinh-anh-avatar-cute.jpg?ssl=1',
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
                'avt' => 'https://cdn.alongwalk.info/info/wp-content/uploads/2022/11/16190607/image-99-hinh-avatar-cute-ngau-ca-tinh-de-thuong-nhat-cho-nam-nu-9bf79a48fa0f9fe5702209a1a052c2d8.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_role' => 2,  
                'google_id' => null             
            ]

            
        ]);
    }
}

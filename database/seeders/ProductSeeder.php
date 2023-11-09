<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('products')->insert([
            [
                'id_category'=>'1',
                'name_product' => 'Adidas Samba',
                'price'=>'395 VND',
                'description'=>'Giày Adidas Samba là một biểu tượng thời trang với thiết kế retro, chất liệu da bền bỉ và đế cao su classic, tạo nên sự pha trộn hoàn hảo giữa phong cách và chất lượng.',
                'avt'=>'https://i.pinimg.com/564x/c0/7c/ff/c07cff27a40e74e99d859bccd08f3b4e.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

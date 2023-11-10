<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('product_details')->insert([
            [
                'id_product' => '1',
                'size' => '36',
                'color' => 'Cloud White, Core Black',
                'avt' => 'https://i.pinimg.com/564x/1a/67/fc/1a67fc81f56efebe2a48aa0ed68841e9.jpg',
                'inventory_number' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_product' => '3',
                'size' => '38',
                'color' => 'Black',
                'avt' => 'https://i.pinimg.com/564x/3e/c5/ee/3ec5ee3316e052efa6365df3c90779f5.jpg',
                'inventory_number' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_product' => '4',
                'size' => '37',
                'color' => 'Blue',
                'avt' => 'https://i.pinimg.com/564x/32/2d/70/322d70635f64e7d376c3f73241ea1c6e.jpg',
                'inventory_number' => '5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

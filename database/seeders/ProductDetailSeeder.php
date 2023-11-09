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
        ]);
    }
}

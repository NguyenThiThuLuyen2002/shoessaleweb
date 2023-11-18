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

        DB::table('products')->insert([
            [
                'id_category' => '1',
                'name_product' => 'Adidas Samba',
                'price' => '395000',
                'description' => 'Giày Adidas Samba là một biểu tượng thời trang với thiết kế retro, chất liệu da bền bỉ và đế cao su classic, tạo nên sự pha trộn hoàn hảo giữa phong cách và chất lượng.',
                'avt' => 'https://i.pinimg.com/564x/c0/7c/ff/c07cff27a40e74e99d859bccd08f3b4e.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_category' => '2',
                'name_product' => 'Strappy Leather Heeled Sandal',
                'price' => '415000',
                'description' => ' Sandal sang trọng với thiết kế đơn giản nhưng tinh tế, chất liệu chất lượng và màu sắc nổi bật, là điểm nhấn hoàn hảo cho bất kỳ bộ trang phục nào.',
                'avt' => 'https://i.pinimg.com/564x/81/fb/0f/81fb0ff4d65d3c7dfe5d26e4abf511be.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_category' => '3',
                'name_product' => 'Roger Vivier',
                'price' => '610000',
                'description' => 'Roger Vivier - Nét đẹp sang trọng và độc đáo, là sự kết hợp hoàn hảo giữa nghệ thuật thủ công và phong cách hiện đại trong từng đôi giày.',
                'avt' => 'https://i.pinimg.com/564x/b6/33/ed/b633ed51d4f745abfd9efacaf7c0de13.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_category' => '2',
                'name_product' => 'Purple Sandal',
                'price' => '505000',
                'description' => 'Blue Women Heeled Sandal sang trọng với thiết kế đơn giản nhưng tinh tế, chất liệu chất lượng và màu sắc nổi bật, là điểm nhấn hoàn hảo cho bất kỳ bộ trang phục nào.',
                'avt' => 'https://i.pinimg.com/564x/4d/9f/30/4d9f3085aa27db80a09bf49dd048363c.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_category' => '3',
                'name_product' => 'Pumps',
                'price' => '336000',
                'description' => 'Giày Pumps - biểu tượng của sự thanh lịch và quý phái, với thiết kế đơn giản nhưng đầy tinh tế, là điểm nhấn hoàn hảo cho phong cách thời trang thanh lịch và nữ tính.',
                'avt' => 'https://i.pinimg.com/564x/7d/50/cc/7d50cc6b2f7b8c088a65606cf9f06a26.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_category' => '1',
                'name_product' => 'Air Jordan 1 Low Cardinal Red',
                'price' => '1958000',
                'description' => 'Sự kết hợp hoàn hảo giữa phong cách thể thao năng động và sự độc đáo của màu đỏ, tạo nên đôi giày hiện đại và cá tính cho những người yêu thích sự đẳng cấp và phong cách.',
                'avt' => 'https://i.pinimg.com/564x/4c/ae/00/4cae00da24c96affbea71394abc49569.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

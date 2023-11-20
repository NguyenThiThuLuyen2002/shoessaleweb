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
                'avt' => 'AdidasSamba.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_category' => '2',
                'name_product' => 'Strappy Leather Heeled Sandal',
                'price' => '415000',
                'description' => ' Sandal sang trọng với thiết kế đơn giản nhưng tinh tế, chất liệu chất lượng và màu sắc nổi bật, là điểm nhấn hoàn hảo cho bất kỳ bộ trang phục nào.',
                'avt' => 'Strappy Leather Heeled Sandal.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_category' => '3',
                'name_product' => 'Roger Vivier',
                'price' => '610000',
                'description' => 'Roger Vivier - Nét đẹp sang trọng và độc đáo, là sự kết hợp hoàn hảo giữa nghệ thuật thủ công và phong cách hiện đại trong từng đôi giày.',
                'avt' => 'Roger Vivier.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_category' => '2',
                'name_product' => 'Purple Sandal',
                'price' => '505000',
                'description' => 'Blue Women Heeled Sandal sang trọng với thiết kế đơn giản nhưng tinh tế, chất liệu chất lượng và màu sắc nổi bật, là điểm nhấn hoàn hảo cho bất kỳ bộ trang phục nào.',
                'avt' => 'Purple Sandal.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_category' => '3',
                'name_product' => 'Pumps',
                'price' => '336000',
                'description' => 'Giày Pumps - biểu tượng của sự thanh lịch và quý phái, với thiết kế đơn giản nhưng đầy tinh tế, là điểm nhấn hoàn hảo cho phong cách thời trang thanh lịch và nữ tính.',
                'avt' => 'Pumps.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_category' => '1',
                'name_product' => 'Air Jordan 1 Low Cardinal Red',
                'price' => '1958000',
                'description' => 'Sự kết hợp hoàn hảo giữa phong cách thể thao năng động và sự độc đáo của màu đỏ, tạo nên đôi giày hiện đại và cá tính cho những người yêu thích sự đẳng cấp và phong cách.',
                'avt' => 'Air Jordan 1 Low Cardinal Red.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

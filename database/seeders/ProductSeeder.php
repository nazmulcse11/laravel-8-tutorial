<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            ['name'=>'Tshirt','category_id'=>'1'],
            ['name'=>'Panjabi','category_id'=>'2'],
            ['name'=>'Pant','category_id'=>'3'],
            ['name'=>'Shari','category_id'=>'3'],
            ['name'=>'Read T-shirt','category_id'=>'1'],
            ['name'=>'Casual T-shirt','category_id'=>'1'],
            ['name'=>'Formal Shirt','category_id'=>'2'],
        ];
        Product::insert($product);
    }
}

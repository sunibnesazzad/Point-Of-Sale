<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creating 1st product

        $product = new Product();
        $product->brand_name = 'Samsung';
        $product->generic_name = "S8";
        $product->category = 'Mobile';
        $product->receive_date = '5-6-2014';
        $product->exp_date = '6-9-2020';
        $product->orginal_price = 90;
        $product->sell_price = 120;
        $product->quantity = 100;
        $product->quantity_left = 100;
        //Total value finding
        $sell = $product->sell_price;
        $left = $product->quantity_left;
        $product->total= $sell * $left;
        $product->save();


        //Creating 2nd product

        $product2 = new Product();
        $product2->brand_name = 'Nokia';
        $product2->generic_name = "N72";
        $product2->category = 'Mobile';
        $product2->receive_date = '5-6-2014';
        $product2->exp_date = '6-9-2020';
        $product2->orginal_price = 120;
        $product2->sell_price = 130;
        $product2->quantity = 100;
        $product2->quantity_left = 100;
        //Total value finding
        $sell = $product2->sell_price;
        $left = $product2->quantity_left;
        $product2->total= $sell * $left;
        $product2->save();

    }
}

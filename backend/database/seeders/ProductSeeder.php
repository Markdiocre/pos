<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->unsignedBigInteger('product_type_id');
        // $table->float('price');
        // $table->text('description');
        // $table->string('name');

        $products = [
            //Beverages
            [
                'product_type_id'=>'1',
                'price'=>40.00,
                'name'=>'Coke',
                'description'=>'A can of coke'
            ],
            [
                'product_type_id'=>'1',
                'price'=>40.00,
                'name'=>'Pepsi',
                'description'=>'A can of Pepsi'
            ],
            [
                'product_type_id'=>'1',
                'price'=>40.00,
                'name'=>'RC',
                'description'=>'A can of RC'
            ],

            //Breakfast
            [
                'product_type_id'=>'2',
                'price'=>90.00,
                'name'=>'Hotdogs',
                'description'=>'Jolly Hotdogs ni Aljur'
            ],
            [
                'product_type_id'=>'2',
                'price'=>100,
                'name'=>'Pesilog',
                'description'=>'Pepsi at Itlog'
            ],
            [
                'product_type_id'=>'2',
                'price'=>50,
                'name'=>'Hotshots',
                'description'=>'Small chicken wings'
            ],

            //Dessert
            [
                'product_type_id'=>'3',
                'price'=>100.00,
                'name'=>'Ice cream',
                'description'=>'We scream for Ice Cream'
            ],
            [
                'product_type_id'=>'3',
                'price'=>25,
                'name'=>'Cornetto',
                'description'=>'20 Pesos sa commercial pero 25 sa totoong buhay'
            ],
            [
                'product_type_id'=>'3',
                'price'=>90,
                'name'=>'Magnum Ice Cream',
                'description'=>'Crunchy'
            ],

            //Burgers
            [
                'product_type_id'=>'4',
                'price'=>65,
                'name'=>'Bully Burger',
                'description'=>'Jam Packed burger'
            ],
            [
                'product_type_id'=>'4',
                'price'=>200,
                'name'=>'Quarter Pounder Burger',
                'description'=>'Juicy patties'
            ],
            [
                'product_type_id'=>'4',
                'price'=>95,
                'name'=>'Chicken burger',
                'description'=>'Super delicious'
            ],
        ];


        DB::table('products')->insert($products);
    }
}

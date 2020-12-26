<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'name'=>"Dell Latitude E7490",
        		'description'=>"Hang xin",
        		'price'=>14500000,
        		'quantity'=>100,
        		'image'=>"pKdVlL_model01.png,Bro8oc_model02.png,ADzjzi_model03.png",
        		'cpu'=>"Core i5",
        		'ram'=>"8GB",
        		'disk'=>"256GB",
        		'vga'=>"Không",
        		'screen'=>"14.0",
        		'resolution'=>"1920*1680",
        		'video'=>"https://www.youtube.com/watch?v=jTqSDb1agE8",
        		'tags_id'=>"1",
        		'brand_id'=>1,
        		'productline_id'=>1,
        	],
        	[
        		'name'=>"Dell Latitude E5590",
        		'description'=>"Hang xin",
        		'price'=>15500000,
        		'quantity'=>150,
        		'image'=>"M6prJr_dell_5990_1.jpg,pcAZsZ_dell_5990_2.jpg,udGsEQ_dell_5990_3.jpg",
        		'cpu'=>"Core i5",
        		'ram'=>"8GB",
        		'disk'=>"256GB",
        		'vga'=>"Không",
        		'screen'=>"15.0",
        		'resolution'=>"1920*1680",
        		'video'=>"https://www.youtube.com/watch?v=hLXGESIYDMI",
        		'tags_id'=>"1",
        		'brand_id'=>1,
        		'productline_id'=>1,
        	],
        	
        ];
        DB::table('products')->insert($data);
    }
}

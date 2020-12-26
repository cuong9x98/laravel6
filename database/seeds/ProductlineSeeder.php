<?php

use Illuminate\Database\Seeder;

class ProductlineSeeder extends Seeder
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
        		'name'=>"Dell Latitude",
        		'brand_id'=>1,
        	],
            [
                'name'=>"Dell Xps",
                'brand_id'=>1,
            ],
            [
                'name'=>"Dell Inspiron",
                'brand_id'=>1,
            ],
             [
                'name'=>"Dell Gamming",
                'brand_id'=>1,
            ],
             [
                'name'=>"Dell Ailineware",
                'brand_id'=>1,
            ],
            [
                'name'=>"Dell Vostro",
                'brand_id'=>1,
            ],
        	[
        		'name'=>"Hp Probook",
        		'brand_id'=>2,
        	],
            [
                'name'=>"Hp Elite",
                'brand_id'=>2,
            ],
            [
                'name'=>"Hp Envy",
                'brand_id'=>2,
            ],
            [
                'name'=>"Hp Pavilion",
                'brand_id'=>2,
            ],
            [
                'name'=>"Hp Polio",
                'brand_id'=>2,
            ],
            [
                'name'=>"Lenovo Thinkpad T",
                'brand_id'=>3,
            ],
            [
                'name'=>"Lenovo Thinkpad X $ Yoga",
                'brand_id'=>3,
            ],
            [
                'name'=>"Lenovo Thinkpad E & L",
                'brand_id'=>3,
            ],
            [
                'name'=>"Lenovo Thinkpad W & P",
                'brand_id'=>3,
            ],
            [
                'name'=>"MacBook Air",
                'brand_id'=>4,
            ],
             [
                'name'=>"MacBook Pro",
                'brand_id'=>4,
            ],
             [
                'name'=>"MSI Gamming",
                'brand_id'=>5,
            ],
            [
                'name'=>"Asus Gamming",
                'brand_id'=>6,
            ],
            [
                'name'=>"Asus VivoBook",
                'brand_id'=>6,
            ],
            [
                'name'=>"Acer Gamming",
                'brand_id'=>7,
            ],
        	
        ];
        DB::table('productlines')->insert($data);
    }
}

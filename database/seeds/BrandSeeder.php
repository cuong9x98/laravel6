<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
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
        		'name'=>"Dell",
        	],
        	[
        		'name'=>"Hp",
        	],
            [
                'name'=>"Lenovo",
            ],
            [
                'name'=>"Apple",
            ],
        	[
                'name'=>"MSI",
            ],
            [
                'name'=>"Asus",
            ],
            [
                'name'=>"Acer",
            ],
        ];
        DB::table('brands')->insert($data);
    }
}

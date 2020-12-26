<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
        		'name'=>"Laptop",
        	],
        	[
        		'name'=>"Ổ cứng",
        	],
            [
                'name'=>"Ram",
            ],
        	
        ];
        DB::table('categories')->insert($data);
    }
}

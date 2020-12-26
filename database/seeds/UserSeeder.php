<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
        		'name'=>"Đỗ Quốc Cường",
	            'username'=>"admin",
	           	'password'=>bcrypt('admin123'),
	           	'email'=>"cuong9x98@gmail.com",
	            'status'=>1,
        	],
            [
                'name'=>"Đỗ Đức Thịnh",
                'username'=>"blog",
                'password'=>bcrypt('admin123'),
                'email'=>"cuong9x91@gmail.com",
                'status'=>1,
            ],
            [
                'name'=>"Nguyễn Bá Nhật",
                'username'=>"product",
                'password'=>bcrypt('admin123'),
                'email'=>"cuong9x92@gmail.com",
                'status'=>1,
            ],
            [
                'name'=>"Ngô Minh Đạt",
                'username'=>"support",
                'password'=>bcrypt('admin123'),
                'email'=>"cuong9x93@gmail.com",
                'status'=>1,
            ],
            
        	
        ];
        DB::table('users')->insert($data);
    }
}

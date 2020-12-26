<?php

use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
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
        		'name'=>"CÔNG TY CỔ PHẦN MÁY TÍNH HÀ NỘI – HANOICOMPUTER",
        		'phone'=>"024 3628 5551",
        		'address'=>"131 Lê Thanh Nghị-Hai Bà Trưng-Hà Nội ",
        		'email'=>"hncompoter@gmail.com",
        	],
        	[
        		'name'=>"CÔNG TY TNHH TIN HỌC MAI HOÀNG",
        		'phone'=>"0243 5377 109",
        		'address'=>" 60 Láng Hạ, Đống Đa, Hà Nội",
        		'email'=>"maihoang@gmail.com",
        	],
        	[
        		'name'=>"CÔNG TY TNHH MÁY TÍNH VÀ VIỄN THÔNG AN KHANG",
        		'phone'=>"1900 2655",
        		'address'=>"Số 210-Thái Hà-Trung-Liệt-Đống Đa-Hà Nội",
        		'email'=>"ankhang@gmail.com",
        	],
        	[
        		'name'=>"CÔNG TY CỔ PHẦN THẾ GIỚI SỐ TRẦN ANH",
        		'phone'=>"1900 545 546",
        		'address'=>"174 Đường Láng-Láng Thượng-Đống Đa-Hà Nội",
        		'email'=>"trananh@gmail.com",
        	],
        ];
        DB::table('providers')->insert($data);
    }
}

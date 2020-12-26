<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::group(['namespace'=>'admin','prefix'=>'admin'],function(){
	Route::group(['namespace'=>'user','prefix'=>'user'],function(){
		Route::get('login','UserController@login')->name('admin.user.login');
		Route::post('check-login','UserController@checkLogin')->name('admin.user.checkLogin');
	});
});
// Admin
Route::group(['namespace'=>'admin','prefix'=>'admin','middleware'=>'checklogin'],function(){
	//Logout
	Route::group(['namespace'=>'user','prefix'=>'user'],function(){
		Route::get('logout','UserController@logout')->name('admin.user.logout');
	});

	// Home
	Route::group(['namespace'=>'home'],function(){
		Route::get('/index','HomeController@index')->name('admin.home.index');
	});

	//Role
	Route::group(['namespace'=>'role','middleware' => ['role:admin']],function(){
		Route::resource('role', 'RoleController');
	});

	//User
	Route::group(['namespace'=>'user','middleware' => ['role:admin']],function(){
		Route::resource('user', 'UserController');
	});

	//Category
	Route::group(['namespace'=>'category','middleware' => ['role:product|admin']],function(){
		Route::resource('category', 'CategoryController');
	});

	//Brand
	Route::group(['namespace'=>'brand','middleware' => ['role:product|admin']],function(){
		Route::resource('brand', 'BrandController');
	});

	//Productline
	Route::group(['namespace'=>'productline'],function(){
		Route::resource('productline', 'ProductlineController');
	});

	//Blog
	Route::group(['namespace'=>'blog','middleware' => ['role:blog|admin']],function(){
		Route::resource('blog', 'BlogController');
	});

	//Banner
	Route::group(['namespace'=>'banner','middleware' => ['role:blog|admin']],function(){
		Route::resource('banner', 'BannerController');
		Route::get('banner/choose-banner/{banner}','BannerController@choose')->name('admin.banner.choose');

	});

	//Product
	Route::group(['namespace'=>'product','middleware' => ['role:product|admin']],function(){
		Route::resource('product', 'ProductController');
		Route::post('product/select_productline','ProductController@selectProductline')->name('select_productline');
	});

	//Bill
	Route::group(['namespace'=>'bill','middleware' => ['role:product|admin']],function(){
		Route::resource('bill', 'BillController');
		Route::post('bill/choose-product','BillController@choose')->name('admin.bill.choose');
		Route::get('bill/print-product/{checkcode}','BillController@print')->name('admin.bill.print');
		Route::get('bill/delete-product/{bill}','BillController@delete')->name('admin.bill.delete');
		Route::post('bill/change-qty','BillController@change_qty')->name('admin.bill.change');
	});

	//Order
	Route::group(['namespace'=>'order','middleware' => ['role:product|admin']],function(){
		Route::resource('order', 'OrderController');
		Route::post('order/choose-product','OrderController@choose')->name('admin.order.choose');
		Route::get('order/print-product/{checkcode}','OrderController@print')->name('admin.order.print');
		Route::get('order/sale','OrderController@sale')->name('admin.order.sale');
		Route::get('order/see/{order}','OrderController@see')->name('admin.order.see');
	});

	//Provider
	Route::group(['namespace'=>'provider','middleware' => ['role:product|admin']],function(){
		Route::resource('provider', 'ProviderController');
	});

	//report
	Route::group(['namespace'=>'report','middleware' => ['role:product|admin']],function(){
		Route::get('report/index','ReportController@index')->name('admin.report.index');
	});
});


//Client
Route::group(['namespace'=>'client'],function(){
	//Home
	Route::group(['namespace'=>'home'],function(){
		Route::get('/','HomeController@index')->name('home.index');
		Route::get('product/{id}','HomeController@show')->name('client.home.show');
		//Blog in Home
		Route::get('/blog','HomeController@listBlog')->name('client.blog.list');
		Route::get('/blog/{id}','HomeController@showBlog')->name('client.blog.showBlog');
	});

	//Detail
	Route::group(['namespace'=>'detail'],function(){
		Route::post('/product-to-cart','DetailController@store')->name('client.detail.store');
	});

	//Cart
	Route::group(['namespace'=>'cart'],function(){
		Route::get('/list-cart','CartController@index')->name('client.cart.index');
	});

	//Checkout
	Route::group(['namespace'=>'checkout'],function(){
		Route::get('/check-out','CheckoutController@create')->name('client.checkout.create');
		Route::post('/pay-ment','CheckoutController@store')->name('client.checkout.store');
	});
});


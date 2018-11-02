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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');



// Route::get('hoclaravel', function(){
// 	echo 'Học lập trình laravel';
// });


// Route::get('thongtin', 'HelloController@showinfo');

// Route::get('hoten/{name}', function($abc){
// 	echo 'Ban ten la '.$abc;
// });

// Route::get('monan/{food?}', function($food=null){
// 	if(isset($food))
// 		echo "Ban da chon $food";
// 	else
// 		echo 'Ban chưa chọn món';
// });

// Route::get('info/{year}/{name}', function($year, $name){
// 	return "Bạn $name có $year tuổi.";
// })->where(['year' => '[0-9]+', 'name' => '[a-zA-Z]+']);

// // Truyền giá trị cho view

// Route::get('call-view', function(){
// 	$name = 'PT';
// 	return view('view-exam', compact('name')); // ['name'=>$name]
// });



// Route::get('testaction', 'HelloController@testAction');
// // Định danh
// Route::get('quoc-te', ['as' => 'qt', function(){ //qt dùng trong form, rout...
// 	return 'Trang Quoc TE';
// }]);

// // gom nhóm

// Route::group(['prefix' => 'lap-trinh'], function(){
// 	Route::get('PHP', function(){
// 		return 'Lập trình PHP';
// 	});
// 	Route::get('ASP', function(){
// 		return 'Lập trình ASP';
// 	});
// });



// Route::get('goi-view', function(){
	
// 	return view('layout.sub.view1');
// });
// // chia sẻ dữ liệu
// View::share('title', 'Test title'); //toàn bộ
// //chọn view
// View::composer(['layout.sub.view1', 'layout.sub.view2'], function($view){
// 	return $view->with('info', 'Đây là trang cá nhân');

// });

// Route::get('check-view', function(){
// 	if(view()->exists('layout.sub.view2')){
// 		echo 'Ton tai view layout.sub.view2';
// 	} else {
// 		echo 'Không có layout.sub.view2';
// 	}
// });


// Route::get('view-exam1', function(){
// 	return view('viewexam.view1');
// });

// Route::get('view-exam2', function(){
// 	return view('viewexam.view2');
// });

// Route::group(['prefix' => 'url'], function(){
// 	Route::get('full', function(){
// 		return URL::full();
// 	});

// 	Route::get('to', function(){
// 		echo URL::to('info', ['year'=>2018, 'name' => 'Phong Bui']);
// 		echo '<br>';
// 		echo URL::to('info', ['year'=>2018, 'name' => 'Phong Bui'], true); //https
// 	});

// 	Route::get('asset', function(){
// 		// return URL::asset('css/mystyle.css');
// 		echo asset('css/mystyle.css');
// 		echo '<br>';
// 		echo asset('css/mystyle.css', true); //https
// 	});

// 	//Chi https

// 	Route::get('secure', function(){
		
// 		echo secure_url('info', ['year'=>2018, 'name' => 'Phong Bui']);
// 	});

// });

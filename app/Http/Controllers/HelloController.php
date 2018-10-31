<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HelloController extends Controller {

	public function index(){
		echo 'Đây là trang index';
	}

	public function showinfo(){
		echo 'Đây là trang thông tin cá nhân';
	}

	public function testAction(){
		echo 'Test Action';
		return redirect()->route('qt');
	}
}
@extends('viewexam.master')

@section('title', 'View 1')

@section('menu')
	@parent
	<h3>Day la menu o view1</h3>
@stop

@section('content')

	<h1>Trang view 1</h1>
	<?php 
		$name = 'Phong Bui';
		$nickname = '<u>PT</u>';
		$grade = 5;

	?>

	<h2>Ho ten: {{$name}}</h2>
	<h2>Nickname: {!!$nickname!!}</h2>

	@if ($grade >=8){
		Gioi
	}
	@elseif ($grade >=5)
		Trung Binh
	@else
		Kem
	@endif

	<h3> {{ isset($year)? $year : 'Khong co nam duoc thiet lap'}} </h3>
	{{-- <h3> {{ $year or 'Khong co nam duoc thiet lap'}} </h3> --}}
@stop

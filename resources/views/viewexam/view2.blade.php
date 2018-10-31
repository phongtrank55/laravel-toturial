@extends('viewexam.master')

@section('title', 'View 2')

@section('menu')
	@parent
	<h3>Day la menu o view2</h3>
@stop

@section('content')

	<h1>Trang view 2</h1>

	
	@for( $i=1; $i<=10; $i++)
		{{$i . ' '}}
	@endfor
	
	<br>
	
	<?php 
		$i=10;
		$foods = ['Com', 'Chao', 'Pho']
	?>


	@while($i > 0)
		{{$i . ' '}}
		<?php $i--; ?>
	@endwhile
	
	<br>

	@foreach($foods as $food)
		{{$food . ' '}}
	@endforeach

@stop

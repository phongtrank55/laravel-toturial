<!DOCTYPE html>
<html>
<head>
	<title>Laravel toturial - @yield('title')</title>
	<style type="text/css">
		#wrapper{
			width: 980px;
			height: auto;
			margin: 0 auto;
		}
		#header{
			width: auto;
			height: 100px;
			background-color: red;
		}
		#content{
			width: auto;
			height: 400px;
			background-color: green;
		}
		#footer{
			width: auto;
			height: 50px;
			background-color: blue;
		}
	</style>
</head>
<body>
	<div id = "wrapper">
		<div id = "header">
			@section('menu')
				<h2>Day la menu o master</h2>
			@show
		</div>
		@include('viewexam.marquee', ['str' => 'Hoc lap trinh laravel 2'])
		<div id = "content">
			@yield('content')
		</div>
		<div id = "footer"></div>
	</div>

</body>
</html>
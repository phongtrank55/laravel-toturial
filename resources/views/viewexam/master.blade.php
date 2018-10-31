<!DOCTYPE html>
<html>
<head>
	<title>Laravel toturial - @yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('public/template/css/mystyle.css')}}">
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
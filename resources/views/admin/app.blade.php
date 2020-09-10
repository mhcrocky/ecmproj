<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title') - {{ config('app.name') }}</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css')}}">
	@yield('styles')
</head>
<body class="app sidebar-mini rtl">
	
	@include('admin.partials.header')
	@include('admin.partials.sidebar')

	<main class="app-content" id="app">
		@yield('content')
	</main>

	<!-- Essential javascripts for application to work-->
	<script type="text/javascript" src="{{ asset('backend/js/jquery-3.3.1.min.js') }} "></script>
	<script type="text/javascript" src="{{ asset('backend/js/popper.min.js') }} "></script>
	<script type="text/javascript" src="{{ asset('backend/js/bootstrap.min.js') }} "></script>
	<script type="text/javascript" src="{{ asset('backend/js/main.js') }}"></script>
	<script type="text/javascript" src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>

	@stack('scripts')

</body>
</html>
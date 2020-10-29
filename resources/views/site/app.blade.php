<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link href="{{ asset('frontend/images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
	<title> @yield('title') - {{ config('app.name') }} </title>

	@include('site.partials.styles')

</head>
<body>
	@include('site.partials.header')
	@include('site.partials.nav')
	@yield('content')
	@include('site.partials.footer')
	<!-- @include('site.partials.scripts') -->
</body>
</html>
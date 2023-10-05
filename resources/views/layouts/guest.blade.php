<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<meta content="{{config('app.name')}} - Admin Panel HTML template" name="description">
		<meta content="Spruko Private Limited" name="author">
		<meta name="keywords" content="admin, admin template, dashboard, admin dashboard, responsive, bootstrap, bootstrap 5, admin theme, admin themes, bootstrap admin template, scss, ui, crm, modern, flat">

		<!-- Title -->
		<title>{{config('app.name')}} - @yield('title')</title>

		<!--Favicon -->
		<link rel="icon" href="{{url('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

		<!--Bootstrap css -->
		<link href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

		<!-- Style css -->
		<link href="{{url('assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{url('assets/css/dark.css')}}" rel="stylesheet" />
		<link href="{{url('assets/css/skin-modes.css')}}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{url('assets/css/animated.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{url('assets/css/icons.css')}}" rel="stylesheet" />

	    <!-- Color Skin css -->
		<link id="theme" href="{{url('assets/colors/color1.css')}}" rel="stylesheet" type="text/css"/>

	</head>

	<body class="register1">
		<div class="page">
			<div class="page-single">
				<div class="container">
                    {{ $slot }}
				</div>
			</div>
		</div>

		<!-- Jquery js-->
		<script src="{{url('assets/js/jquery.min.js')}}"></script>

		<!-- Bootstrap5 js-->
		<script src="{{url('assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{url('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{url('assets/js/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{url('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!-- Show Password -->
		<script src="{{url('assets/js/bootstrap-show-password.min.js')}}"></script>

		<!-- Custom js-->
		<script src="{{url('assets/js/custom.js')}}"></script>

	</body>
</html>


{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
--}}
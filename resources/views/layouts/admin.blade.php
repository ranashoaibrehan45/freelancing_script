<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="{{config('app.name')}} - Admin Panel" name="description">
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

		<!--Sidemenu css -->
       <link href="{{url('assets/css/sidemenu.css')}}" rel="stylesheet" id="sidemenu-theme">

		<!-- P-scroll bar css-->
		<link href="{{url('assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{url('assets/css/icons.css')}}" rel="stylesheet" />

		<!-- Simplebar css -->
		<link rel="stylesheet" href="{{url('assets/plugins/simplebar/css/simplebar.css')}}">

		<!-- INTERNAL Morris Charts css -->
		<link href="{{url('assets/plugins/morris/morris.css')}}" rel="stylesheet" />

		<!-- INTERNAL Select2 css -->
		<link href="{{url('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

		<!-- INTERNAL Notification -->
		<link href="{{url('assets/plugins/notify/css/jquery.growl.css')}}" rel="stylesheet" />
		<link href="{{url('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />

		<!-- Data table css -->
		<link href="{{url('assets/plugins/datatables/DataTables/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{url('assets/plugins/datatables/Responsive/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />

	    <!-- Color Skin css -->
		<link id="theme" href="{{url('assets/colors/color1.css')}}" rel="stylesheet" type="text/css"/>
	</head>

	<body class="app sidebar-mini">
		
		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{url('assets/images/svgs/loader.svg')}}" alt="loader">
		</div>
		<!--- End Global-loader-->

		<!-- Page -->
		<div class="page">
			<div class="page-main">

				<!--aside open-->
				<aside class="app-sidebar">
					<div class="app-sidebar__logo">
						<a class="header-brand" href="index.html">
							<img src="{{url('assets/images/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Azea logo">
							<img src="{{url('assets/images/brand/logo1.png')}}" class="header-brand-img dark-logo" alt="Azea logo">
							<img src="{{url('assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Azea logo">
							<img src="{{url('assets/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo" alt="Azea logo">
						</a>
					</div>
					@include('admin.sidebar')
				</aside>
				<!--aside closed-->

				<!-- App-Content -->
				@yield('content')
				<!-- End app-content-->


				<!--Footer-->
				<footer class="footer">
					<div class="container">
						<div class="row align-items-center flex-row-reverse">
							<div class="col-md-12 col-sm-12 text-center">
								Copyright © {{date('Y')}} <a href="javascript:void(0);">{{config('app.name')}}</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> RoseSolution </a> All rights reserved
							</div>
						</div>
					</div>
				</footer>
				<!-- End Footer-->
			</div>
		</div>
		<!-- End Page -->

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fe fe-chevron-up"></i></a>

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

		<!--Sidemenu js-->
		<script src="{{url('assets/plugins/sidemenu/sidemenu.js')}}"></script>

		<!-- P-scroll js-->
		<script src="{{url('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
		<script src="{{url('assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>
		<script src="{{url('assets/plugins/p-scrollbar/p-scroll.js')}}"></script>

		<!-- INTERNAL Notification -->
		<script src="{{url('assets/js/notifications.js')}}"></script>
		<script src="{{url('assets/plugins/notify/js/rainbow.js')}}"></script>
		<script src="{{url('assets/plugins/notify/js/jquery.growl.js')}}"></script>
		<script src="{{url('assets/plugins/notify/js/notifIt.js')}}"></script>

		<!--INTERNAL Flot Charts js-->
		<script src="{{url('assets/plugins/flot/jquery.flot.js')}}"></script>
		<script src="{{url('assets/plugins/flot/jquery.flot.fillbetween.js')}}"></script>
		<script src="{{url('assets/plugins/flot/jquery.flot.pie.js')}}"></script>
		<script src="{{url('assets/js/dashboard.sampledata.js')}}"></script>
		<script src="{{url('assets/js/chart.flot.sampledata.js')}}"></script>

		<!-- INTERNAL Chart js -->
		<script src="{{url('assets/plugins/chart/chart.bundle.js')}}"></script>
		<script src="{{url('assets/plugins/chart/utils.js')}}"></script>

		<!-- INTERNAL Apexchart js -->
		<script src="{{url('assets/js/apexcharts.js')}}"></script>

		<!--INTERNAL Moment js-->
		<script src="{{url('assets/plugins/moment/moment.js')}}"></script>

		<!--INTERNAL Index js-->
		<script src="{{url('assets/js/index1.js')}}"></script>

		<!-- INTERNAL Data tables -->
		<script src="{{url('assets/plugins/datatables/DataTables/js/jquery.dataTables.js')}}"></script>
		<script src="{{url('assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js')}}"></script>
		<script src="{{url('assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js')}}"></script>
		<script src="{{url('assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js')}}"></script>

		<!-- INTERNAL Select2 js -->
		<script src="{{url('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{url('assets/js/select2.js')}}"></script>

		<!-- Simplebar JS -->
		<script src="{{url('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>

		<!-- Rounded bar chart js-->
		<script src="{{url('assets/js/rounded-barchart.js')}}"></script>

		<!-- Custom js-->
		<script src="{{url('assets/js/custom.js')}}"></script>

		@yield('page-specific-js')
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>{{$title}}The Moffo's</title>

	<!-- Favicons -->
	<link rel="shortcut icon" href="a{{asset('dashboard/ssets/img/favicon.png')}}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')}}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{asset('dashboard/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('dashboard/assets/plugins/fontawesome/css/all.min.css')}}">

	<!-- Datepicker CSS -->
	<link rel="stylesheet" href="{{asset('dashboard/assets/css/bootstrap-datetimepicker.min.css')}}">

	<!-- Datatables CSS -->
	<link rel="stylesheet" href="{{asset('dashboard/assets/plugins/datatables/datatables.min.css')}}">

	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{asset('dashboard/assets/css/animate.min.css')}}">

	<!-- Select CSS -->
	<link rel="stylesheet" href="{{asset('dashboard/assets/css/select2.min.css')}}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('dashboard/assets/css/admin.css')}}">

</head>

<body>
	<div class="main-wrapper">

		<!-- Header -->
		<div class="header">
			<div class="header-left">
				<a href="index.html" class="logo logo-small">
					<img src="{{asset('dashboard/assets/img/logo-icon.png')}}" alt="Logo" width="30" height="30">
				</a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fas fa-align-left"></i>
			</a>
			<a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
				<i class="fas fa-align-left"></i>
			</a>

			<ul class="nav user-menu">
				<!-- User Menu -->
				<li class="nav-item dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-toggle="dropdown">
						<span class="user-img">
							<img class="rounded-circle" src="{{asset('dashboard/assets/img/user.jpg')}}" width="40" alt="Admin">
                            Admin
						</span>
					</a>
				</li>
				<!-- /User Menu -->

			</ul>
		</div>
		<!-- /Header -->

		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<div class="sidebar-logo">
				<a href="javascript:void(0);">
					<img src="{{asset('dashboard/assets/img/logo-icon.png')}}" class="img-fluid" alt="">
				</a>
			</div>
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
                        <li>
                            <a href="{{route('index')}}"><i class="fas fa-columns"></i> <span>Accueil</span></a>
                        </li>
                        <li class="active">
                            <a href="{{route('famille.details', ['famille_slug'=>$famille->slug])}}"><i class="fas fa-layer-group"></i> <span>Détails</span></a>
                        </li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->

		<div class="page-wrapper">
			@yield("page-wrapper")
		</div>
	</div>

	<!-- jQuery -->
	<script src="{{asset('dashboard/assets/js/jquery-3.5.0.min.js')}}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{asset('dashboard/assets/js/popper.min.js')}}"></script>
	<script src="{{asset('dashboard/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

	<!-- Datepicker Core JS -->
	<script src="{{asset('dashboard/assets/js/moment.min.js')}}"></script>
	<script src="{{asset('dashboard/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

	<!-- Slimscroll JS -->
	<script src="{{asset('dashboard/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('dashboard/assets/js/bootstrapValidator.min.html')}}"></script>

	<!-- Datatables JS -->
	<script src="{{asset('dashboard/assets/plugins/datatables/datatables.min.js')}}"></script>

	<!-- Select2 JS -->
	<script src="{{asset('dashboard/assets/js/select2.min.js')}}"></script>

	<!-- Custom JS -->
	<script src="{{asset('dashboard/assets/js/admin.js')}}"></script>

</body>
</html>

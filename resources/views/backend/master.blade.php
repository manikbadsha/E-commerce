<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="{{url('/')}}/backend_assets/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="{{url('/')}}/backend_assets/vendor/font-awesome/css/font-awesome.min.css">
	<!-- Fontastic Custom icon font-->
	<link rel="stylesheet" href="{{url('/')}}/backend_assets/css/fontastic.css">
	<!-- Google fonts - Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<!-- jQuery Circle-->
	<link rel="stylesheet" href="{{url('/')}}/backend_assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
	<!-- Custom Scrollbar-->
	<link rel="stylesheet" href="{{url('/')}}/backend_assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="{{url('/')}}/backend_assets/css/style.default.css" id="theme-stylesheet">
	<!-- Custom stylesheet - for your changes-->
	<link rel="stylesheet" href="{{url('/')}}/backend_assets/css/custom.css">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{url('/')}}/backend_assets/img/favicon.ico">
	<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 


</head>

<body>
	<!-- Side Navbar -->
	<nav class="side-navbar">
		<div class="side-navbar-wrapper">
			<!-- Sidebar Header    -->
			<div class="sidenav-header d-flex align-items-center justify-content-center">
				<!-- User Info-->
				<div class="sidenav-header-inner text-center"><img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle">
					<h2 class="h5">Manik Badsha</h2><span>Web Developer</span>
				</div>
				<!-- Small Brand information, appears on minimized sidebar-->
				<div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
			</div>
			<!-- Sidebar Navigation Menus-->
			<div class="main-menu">
				<h5 class="sidenav-heading">Main</h5>
				<ul id="side-main-menu" class="side-menu list-unstyled">
                <!-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Catagory </a>
						<ul id="exampledropdownDropdown" class="collapse list-unstyled ">
							<li><a href="#">New Catagory</a></li>
							<li><a href="#">View Catagory</a></li>
						</ul>
					</li> -->

					<li><a href="{{url('/home')}}"> <i class="icon-form"></i>Home</a></li>
					<li><a href="{{url('catagory/backend/page')}}"> <i class="icon-home"></i>Manage Catagory </a></li>
					<li><a href="{{url('subcatagory/backend/page')}}"> <i class="fas fa-boxes"></i>Sub Catagory </a></li>
					<li><a href="{{url('childcatagory/backend/page')}}"> <i class="fas fa-boxes"></i>Child Catagory </a></li>
					 
					<li><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Order Management</a>
						<ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
							<li><a href="{{url('view/sells/product')}}">Pending Order</a></li>
							<li><a href="{{url('approve/all/order')}}">Processing Order</a></li>
							<li><a href="">Pending Ordere</a></li>
							<li><a href="{{url('decline/all/order')}}">Decline Ordere</a></li>
						</ul>
					</li>
					
					<li><a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Product</a>
						<ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
							<!-- <li><a href="{{url('add/product/form')}}">Add Product</a></li>
							<li><a href="{{url('view/all/product')}}">View Product</a></li> -->
							<li><a href="{{url('add/all/product')}}">All Product</a></li>
						</ul>
					</li>
					<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>HomePageSetting</a>
						<ul id="exampledropdownDropdown" class="collapse list-unstyled ">
							<li><a href="{{url('homepage/backend/page')}}">Slider</a></li>
							<li><a href="{{url('homepage/backend/poster')}}">Poster</a></li>
						</ul>
					</li>
					<li><a href="{{url('add/shipping')}}"> <i class="icon-form1"></i>Shipping Method </a></li>
					
				</ul>
			</div>   
			
			</div>
		</div>
	</nav>
	<div class="page">
		<!-- navbar-->
		<header class="header">
			<nav class="navbar">
				<div class="container-fluid">
					<div class="navbar-holder d-flex align-items-center justify-content-between">
						<div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
								<div class="brand-text d-none d-md-inline-block"><span>Bootstrap </span><strong class="text-primary">Dashboard</strong></div>
							</a></div>
						<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
							<!-- Log out-->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
					</div>
				</div>
			</nav>
		</header>




    @yield('content')



        <footer class="main-footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<p>Your company &copy; 2017-2019</p>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<!-- JavaScript files-->
	<script src="{{url('/')}}/backend_assets/vendor/jquery/jquery.min.js"></script>
	<script src="{{url('/')}}/backend_assets/vendor/popper.js/umd/popper.min.js"> </script>
	<script src="{{url('/')}}/backend_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{url('/')}}/backend_assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
	<script src="{{url('/')}}/backend_assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
	<script src="{{url('/')}}/backend_assets/vendor/chart.js/Chart.min.js"></script>
	<script src="{{url('/')}}/backend_assets/vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="{{url('/')}}/backend_assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="{{url('/')}}/backend_assets/js/charts-home.js"></script>
	<!-- Main File-->
	<script src="{{url('/')}}/backend_assets/js/front.js"></script>
	<script src="https://kit.fontawesome.com/c218529370.js"></script>
	<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>

	@yield('footer_js')
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
</body>

</html>
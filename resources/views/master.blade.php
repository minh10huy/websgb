<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8" />
<link rel="shortcut icon" href="{{asset(DUONG_DAN.'favicon.ico')}}" type="image/ico">
<title>Saigonbpo</title>


<!-- CSS
================================================== -->

<link rel="stylesheet" href="{{asset('public/home/css/lity.css')}}" />
<link rel="stylesheet" href="{{asset('public/home/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('public/home/css/bootstrap.css')}}" />
<link rel="stylesheet" href="{{asset('public/home/css/icons.css')}}" />
<link rel="stylesheet" href="{{asset('public/home/css/colors/blue.css')}}" id="colors" />
<link rel="stylesheet" href="{{asset('public/home/css/simplelightbox.min.css')}}" id="colors" />
<link rel="stylesheet" href="{{asset('public/home/css/orgchart.css')}}"/>
<link rel="stylesheet" href="{{asset('public/home/css/video.css')}}"/>
<link rel="stylesheet" href="{{asset('public/home/css/slick.css')}}"/>
<link rel="stylesheet" href="{{asset('public/home/css/slick-theme.css')}}"/>

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">
<!-- Header
================================================== -->
<div class="container">

	<div class="row">
		<div class="header">
			<div class="col-sm-12 col-md-3">
				<div id="logo">
					<a href="{{route('trangchu')}}"><img src="{{asset(DUONG_DAN.'login-logo.png')}}" alt="" /></a>
				</div>
			</div>

			<div class="logout pull-right">
		      @if (Auth::check())
						<span>[Hi , {{ Auth::user()->name }}]</span>
						<a href="{{route('dangxuat')}}"> [Đăng xuất <i class="fa fa fa-sign-out"></i>]</a>
		      @else
						{{""}}
		      @endif
		  </div>

			<div class="clearfix"></div>
		</div>
	</div>

</div>

@include('header')

<!-- Content
================================================== -->
@yield('content')
<!-- Content
================================================== -->

@include('footer')

<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('public/home/js/jquery-2.2.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/superfish.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/jquery.flexslider-min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/jquery.jpanelmenu.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/lity.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/simple-lightbox.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/masonry.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/video.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/slick.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/against.js')}}"></script>



</div><!--/wrapper-->


</body>
</html>

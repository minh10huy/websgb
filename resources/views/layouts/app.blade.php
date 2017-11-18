<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8" />
<title>Saigonbpo</title>

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{asset('public/home/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('public/home/css/animove.css')}}" />

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">
<!-- Content
================================================== -->
@yield('content')
<!-- Content
================================================== -->
</div><!-- Wrapper / End -->

<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('public/home/js/jquery-2.2.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/wow.min.js')}}"></script>


<script>
$(document).ready(function(){
	new WOW().init();

	var formInputs = $('input[type="text"],input[type="password"]');
	formInputs.focus(function() {
			 $(this).parent().children('p.formLabel').addClass('formTop');
			 $('div.logo').addClass('logo-active');
	});
	formInputs.focusout(function() {
		if ($.trim($(this).val()).length == 0){
		$(this).parent().children('p.formLabel').removeClass('formTop');
		}
		$('div.logo').removeClass('logo-active');
	});
	$('p.formLabel').click(function(){
		 $(this).parent().children('.form-style').focus();
	});
});
</script>



</body>
</html>

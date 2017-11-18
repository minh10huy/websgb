<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Saigonbpo Admin</title>
	<!-- CSRF Token -->
	<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('public/admin/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/admin/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/admin/assets/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/admin/assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/admin/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->


  <script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/tables/datatables/extensions/responsive.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>

  <script type="text/javascript" src="{{asset('public/admin/assets/js/pages/datatables_responsive.js')}}"></script>

  <!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/form_layouts.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>

	<script type="text/javascript" src="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/editor_ckeditor.js')}}"></script>

	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/pickers/daterangepicker.js')}}"></script>
 	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/picker_date.js')}}"></script>


 <!-- /theme JS files-->
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-default header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{route('quantri')}}"><img src="{{asset('public/admin/assets/images/logo_light.png')}}" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<!-- @if (Auth::user()) -->
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<span>{{ Auth::user()->name }}</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
							<li>
								  <a href="{{route('admin-dangxuat')}}"> <i class="icon-switch2"></i>Đăng xuất</a>
							</li>
					</ul>
				</li>
			</ul>
			<!-- @endif -->
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="active"><a href="{{route('quantri')}}"><i class="icon-home4"></i> <span>Trang chủ</span></a></li>

								@if (Auth::user()->name === 'HR')
									<li>
										<a href="#"><i class="icon-people"></i> <span>Nhân sự</span></a>
										<ul>
											<li><a href="{{route('them-member')}}" target="_blank"><i class="icon-file-plus"></i> <span>Thêm nhân sự</span></a></li>
											<li><a href="{{route('quanli-member')}}"><i class="icon-list"></i> <span>Danh sách</span></a></li>
										</ul>
									</li>
								@else
								<li>
									<a href="#"><i class="icon-magazine"></i> <span>Tin Tức</span></a>
									<ul>
										<li><a href="{{route('them-tin')}}" target="_blank"><i class="icon-file-plus"></i> <span>Thêm Tin</span></a></li>
										<li><a href="{{route('quanli-tin')}}"><i class="icon-list"></i> <span>Danh sách</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-grid"></i> <span>Phòng Ban</span></a>
									<ul>
										<li><a href="{{route('them-bophan')}}" target="_blank"><i class="icon-file-plus"></i> <span>Thêm Phòng Ban</span></a></li>
										<li><a href="{{route('quanli-bophan')}}"><i class="icon-list"></i> <span>Danh sách</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-chess-king"></i> <span>Chức vụ</span></a>
									<ul>
										<li><a href="{{route('them-chucvu')}}" target="_blank"><i class="icon-file-plus"></i> <span>Thêm Chức Vụ</span></a></li>
										<li><a href="{{route('quanli-chucvu')}}"><i class="icon-list"></i> <span>Danh sách</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-people"></i> <span>Nhân sự</span></a>
									<ul>
										<li><a href="{{route('them-member')}}" target="_blank"><i class="icon-file-plus"></i> <span>Thêm nhân sự</span></a></li>
										<li><a href="{{route('quanli-member')}}"><i class="icon-list"></i> <span>Danh sách</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-image4"></i> <span>Album</span></a>
									<ul>
										<li><a href="{{route('them-album')}}" target="_blank"><i class="icon-file-plus"></i> <span>Thêm album</span></a></li>
										<li><a href="{{route('quanli-album')}}"><i class="icon-list"></i> <span>Danh sách</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-images2"></i> <span>Hình ảnh</span></a>
									<ul>
										<li><a href="{{route('them-photo')}}" target="_blank"><i class="icon-file-plus"></i> <span>Thêm ảnh</span></a></li>
										<li><a href="{{route('quanli-photo')}}"><i class="icon-list"></i> <span>Danh sách</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-video-camera3"></i> <span>Video</span></a>
									<ul>
										<li><a href="{{route('them-video')}}" target="_blank"><i class="icon-file-plus"></i> <span>Thêm Video</span></a></li>
										<li><a href="{{route('quanli-video')}}"><i class="icon-list"></i> <span>Danh sách</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-graph"></i> <span>Khảo sát</span></a>
									<ul>
										<li><a href="{{route('them-cauhoi')}}" target="_blank"><i class="icon-file-plus"></i> <span>Thêm Câu Hỏi</span></a></li>
										<li><a href="{{route('quanli-cauhoi')}}"><i class="icon-list"></i> <span>Danh sách câu hỏi</span></a></li>

										<li><a href="{{route('them-traloi')}}" target="_blank"><i class="icon-file-plus"></i> <span>Thêm Câu Trả Lời</span></a></li>
										<li><a href="{{route('quanli-traloi')}}"><i class="icon-list"></i> <span>Danh sách trả lời</span></a></li>
									</ul>
								</li>
							  @endif
							</ul><!--end ul sidebar-->
						</div>
					</div><!-- /main navigation -->
				</div>
			</div><!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				@yield('content')

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>

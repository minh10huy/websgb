@extends('layouts.app')

@section('content')
<div id="formWrapper">

	<div id="loginform">

    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
		 	{{ csrf_field() }}

			<div class="logo wow zoomIn" data-wow-duration="1s" data-wow-delay="500ms">
				<img class="img-responsive" src="{{asset(DUONG_DAN.'login-logo.png')}}" alt="logo"/>
			</div>

			<div class="form-item">
				<p class="formLabel">Tên đăng nhập:</p>
				<input type="text" name="username" id="username" class="form-style" autocomplete="off" value="{{ old('username') }}" required autofocus/>
        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
			</div>

			<div class="form-item">
				<p class="formLabel">Mật khẩu:</p>
				<input type="password" name="password" id="password" class="form-style" required />
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
			</div>

			<div class="form-item">
				<input type="submit" class="login" value="Đăng nhập" data-type="page-transition">
			</div>

    </form><!--end form-->

	</div><!--end loginform-->

</div><!--end formWrapper-->
@endsection

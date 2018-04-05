@extends('layouts.app')

@section('content')
<!-- BEGIN LOGO -->
<div class="logo">
	<!-- <a href="index.html">
	<img src="../../assets/admin/layout/img/logo-big.png" alt=""/>
	</a> -->
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
		<h3 class="form-title text-center">Admin Yaso Coop</h3>
		
		<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" name="username" value="{{ old('username') }}" required autofocus placeholder="USERNAME"/>
            </div>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" name="password" required placeholder="PASSWORD"/>
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/> Remember me </label>
			<button type="submit" class="btn green-haze pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		
	</form>
	<!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->
@endsection

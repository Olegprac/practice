@extends('partials.nav')
@section('title', '')
@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection
@section('content')
<div class="main-cont">
	<div class="log-f-cont">
		<form method="POST" action="{{ route('authenticate') }}">
			@csrf
			<div class="f-instr">
				Input your username:
			</div>
			<input class="t-i" name="username" value="{{ old('username') }}" />
			<div class="f-instr">
				Input your password:
			</div>
			<input class="t-i" name="password" type="password" value="{{ old('password') }}"/>
			<div class="chk-cont" >
				<input class="i-chk" type="checkbox" name="register" />
				First time here? Checkmark to register.
			</div>
			<input class="s-i" type="submit" value="Log In!" />
		</form>
		@if (session('error'))
		<div class="err-hint">
			{{ session('error') }}
		</div>
		@endisset
	</div>
</div>
@endsection
@extends('layouts.app')
@section('app')
@endsection
<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}">
	<script type="text/javascript" src="{{ asset('js/nav.js') }} "></script>
	@yield('links')
</head>
<body>
	<div class="nav-cont"> 
		@guest
		<a href="{{ route('login') }}">
			<div class="log-btn">
				Log In
			</div>
		</a>
		@endguest
		@auth
		<div class="log-btn" onclick="submitbyid('logout-f')">
			Log Out
		</div>
		<form id="logout-f" method="POST" action="{{ route('logout') }}">
			@csrf
			<input type="hidden"/>
		</form>
		<a href="{{ route('usersarticles') }}">
			<div class="nav-btn-1">
				<img class="i-full" src="{{ asset('img/user.png') }}"/>
			</div>
		</a>
		@endif
		<a href="{{ route('articles.create') }}">
			<div class="nav-btn-1">
				<img class="i-full" src="{{ asset('img/add.png') }}"/>
			</div>
		</a>
		<a href="{{ route('articles.index') }}">
			<div class="nav-btn-1">
				<img class="i-full" src="{{ asset('img/home.png') }}"/>
			</div>
		</a>
	</div>
	@yield('content')
</body>
</html>
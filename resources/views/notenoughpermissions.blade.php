@extends('partials.nav')
@section('title', '')
@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/notenoughpermissions.css') }}">
@endsection
@section('content')
<div class="main-cont">
	<div class="notep">
		You don't have enough permissions to access that route.
	</div>
</div>
@endsection
@extends('partials.nav')
@section('title', '')
@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/createarticle.css') }}">
@endsection
@section('content')
<div class="main-cont">
	<div class="cr-form">
		<form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="f-instr">
				Input title:
			</div>
			<input class="t-i" type="text" placeholder="title" name="title" value="{{ old('title') }}"/>
			<div class="f-instr">
				Input main text:
			</div>
			<textarea class="m-i" placeholder="body" name="body">{{ old('body') }}</textarea>
			<div class="f-instr">
				Choose picture:
			</div>
			<input class="i-i" type="file" name="image" value="3" />
			<br />
			<input class="s-i" type="submit" value="Submit!" />
		</form>
		@if (session('error'))
		<div class="err-hint">
			{{ session('error') }}
		</div>
		@endisset
	</div>
</div>
@endsection
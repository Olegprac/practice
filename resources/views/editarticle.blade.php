@extends('partials.nav')
@section('title', '')
@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/editarticle.css') }}">
@endsection
@section('content')
<div class="main-cont">
	<div class="cr-form">
		<form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
			@method('PUT')
			@csrf
			<div class="f-instr">
				Input title:
			</div>
			<input class="t-i" type="text" placeholder="title" name="title" value="{{ $article->title }}" />
			<div class="f-instr">
				Input main text:
			</div>
			<textarea class="m-i" placeholder="body" name="body">{{ $article->body }}</textarea>
			<div class="img-cont">
				<img class="p-img" src="{{ asset('storage/'.$article->imgurl) }}" />
			</div>
			<div class="f-instr">
				Choose picture:
			</div>
			<input class="i-i" type="file" name="image" />
			<br />
			<input class="s-i" type="submit" value="Submit!" />
		</form>
		<div class="hint-cont">
			If you don't want to change the picture, leave that field empty.
		</div>
	</div>
</div>
@endsection
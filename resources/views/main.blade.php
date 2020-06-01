@extends('partials.nav')
@section('title', '')
@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
@endsection
@section('content')
<div class="main-cont">
	@if (count($articles) != 0)
	@foreach ($articles as $article)
	<div class="p-cont">
		<div class="img-cont">
			<img class="i-full" src="{{ asset('storage/'.$article->imgurl) }}" />
		</div>
		<div class="descr-cont">
			<a href="{{ route('articles.show', $article->id) }}">
				<div class="title">
					{{ $article->title }}
				</div>
			</a>
			<div class="maintxt">
				{{ $article->body }}
			</div>
		</div>
	</div>
	@endforeach
	@else
	<div class="no-p">
		There are no posts currently :(
	</div>
	@endif
</div>
@endsection
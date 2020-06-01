@extends('partials.nav')
@section('title', '')
@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/usersarticles.css') }}">
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
		<div class="mng-cont">
			<a href="{{ route('articles.edit', $article->id) }}">
				<div class="mng-btn e">
					<img class="i-full" src="{{ asset('img/edit.png') }}" />
				</div>
			</a>
			<div class="mng-btn d" onclick="submitbyid('del-f{{ $article->id }}')">
				<img class="i-full" src="{{ asset('img/delete.png') }}" />
			</div>
			<form id="del-f{{ $article->id }}" method="POST" action="{{ route('articles.destroy', $article->id) }}">
				@method('DELETE')
				@csrf
				<input type="hidden" />
			</form>
		</div>
	</div>
	@endforeach
	@else
	<div class="no-p">
		You haven't created an article yet :(
	</div>
	@endif
</div>
@endsection
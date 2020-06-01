@extends('partials.nav')
@section('title', '')
@section('links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/viewarticle.css') }}">
@endsection
@section('content')
<div class="main-cont">
	<div class="p-cont">
		<div class="title">
			{{ $article->title }}
			@if (Auth::check())
				@if (Auth::user()->id == $article->user_id)
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
				@endif
			@endif
		</div>
		<div class="img-cont">
			<img class="p-img" src="{{ asset('storage/'.$article->imgurl) }}" />
		</div>
		<div class="maintxt">
			{{ $article->body }}
		</div>
	</div>
</div>
@endsection
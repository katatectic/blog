@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
		<div class="post-preview">	
			<h2>Неопубликованные статьи пользователя {{$user_name}}</h2>		
			
				@foreach ($articles as $article)
				@if ($article->isPublished == 0)

			<h2 class="post-title">
			    <a href="{{route('article', $article->id)}}">{{$article->title}}</a>
			</h2>
			<h3 class="post-subtitle">
			    {{$article->short_text}}
			</h3>			                 
			<p class="post-meta"  style="border-bottom: 1px solid black">Дата публикации: {{$article->publication_date}}</p>
			@endif 
			@endforeach                    
		</div>
	</div>
</div>
@endsection
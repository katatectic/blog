@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    	<div class="col-lg-8 col-md-10 mx-auto">
    		<h1>{{$article->user->name}}</h1>
    		<h2>{{$article->title}}</h2>
    		<h4>{{$article->short_text}}</h4>  		
    		<div>{{$article->full_text}}</div>
    		<div id="photo"><img src="{{$article->photo_path}}" alt="" width="200px" height="200px"></div>
    	</div>	
    </div>    
 	<div class="panel panel-info"  style="margin-top: 50px;">
 		<div class="panel-heading">Комментарии</div>
 		<div class="panel-body comments">
 			@if (!Auth::guest())
 			<form method="POST" action="{{route('add_comment')}}">
			  <div class="form-group">
			    <textarea class="form-control" placeholder="Оставьте Ваш комментарий" rows="5" name="comment"></textarea><br>
			    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			    <input type="hidden" name="article_id" value="{{$article->id}}">
			  	<input type="submit" name="submit" class="btn btn-info pull-right">
			</form>
			@endif
 		<div class="clearfix"></div>
		<ul class="media-list">
			<li class="media">
				@foreach($article->comments as $comment)
				<div class="comment"  style="margin-bottom: 10px; border-bottom: 1px solid black">
					<a href="#" class="pull-left"></a>
					<div class="media-body">
						<strong class="text-success">{{$comment->user->name}}</strong>

						<span class="text-muted">
							<small class="text-muted">Дата публикации: {{$comment->created_at->format('d.m.Y')}}</small>
						</span>

						<p>{{$comment->comment}}</p>
						<!--это я проверяю, чтобы пользователь был либо автором этой статьи, под которой есть комментарии и мог их удалить или чтобы пользователь был автором данного комментария и мог его удалить, а незарегистрированный вообще этой кнопки не видел. -->
						@if(Auth::user())
						@if (Auth::user()->id == $article->user->id || Auth::user()->id == $comment->user->id)
							<div><a href="{{route('delete_comment', $comment->id)}}">Удалить комментарий</a></div>
						@endif
						@endif
					</div>
				</div>
				@endforeach
			</li>
		</ul>
	</div>
@endsection
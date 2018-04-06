@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    	<h2>Создать новый пост</h2>
	    <form action="{{route('create_post')}}" method="POST" enctype="multipart/form-data" >
			<div class="form-group">
				<label for="title">Заголовок статьи</label>
				<input type="text" class="form-control" name="title">
			</div>
			<div class="form-group">
				<label for="short_text">Краткое описание статьи</label>
				<input type="text" class="form-control" name="short_text">
			</div>					
			<div class="form-group">
				<label for="full_text">Текст поста</label>
				<textarea class="form-control" name="full_text" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label for="publication_date">Дата публикации</label>
				<input type="date" class="form-control" name="publication_date">
			</div>
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
			<input type="file" name="image">
			<input type="submit" class="btn btn-primary">			
		</form>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
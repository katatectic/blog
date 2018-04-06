@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Профиль</div>
                <div class="panel-body">
                    <div>
                        Имя пользователя: {{Auth::user()->name}}
                    </div>
                    <div>
                        Фамилия пользователя: {{Auth::user()->surname}}
                    </div>
                    <div>
                        Email пользователя: {{Auth::user()->email}}
                    </div>
                    
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Мои статьи</div>
                <div class="panel-body">
                    <div><a href="{{route('published_articles', Auth::user()->id)}}">Опубликованные статьи</a></div>
                    <div><a href="{{route('unpublished_articles', Auth::user()->id)}}">Неопубликованные статьи</a></div>                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

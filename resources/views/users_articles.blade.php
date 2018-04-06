@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="flex-center position-ref full-height">                           
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        <h2>Все статьи пользователя {{$user_name}}</h2>

                        @foreach ($articles as $article)
                        @if ($article->isPublished == 1)
                        
                        <h2 class="post-title">
                            <a href="{{route('article', $article->id)}}">{{$article->title}}</a>
                        </h2>
                        <h3 class="post-subtitle">
                            {{$article->short_text}}
                        </h3>
                        <!--Ниже мы вызываем метод юзер из модели Артикл, где мы написали его для обращения к таблице юзерз-->                   
                        <p class="post-meta" style="border-bottom: 1px solid gray">Дата публикации: {{$article->publication_date}}</p>
                        @endif 
                        @endforeach                    
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection
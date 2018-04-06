@extends('layouts.app')

@section('content')
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="{{route('welcome')}}">
                  <span data-feather="home"></span>
                  Главная страница блога<span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('articles_edit')}}">
                  <span data-feather="file"></span>
                  Статьи блога
                </a>                
              </li>              
              <li class="nav-item">
                <a class="nav-link" href="{{route('users_edit')}}">
                  <span data-feather="users"></span>
                  Пользователи
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
         <div id="articles">
            <h1>Список статей</h1>    
            @foreach ($articles as $article)
                {{--<div id="author">Автор:
                    <!-- Вот так мы вызываем через связи имя пользователя, кто опубликовал статью. В модели Article.php мы создали метод user, его и вызываем -->
                    <a href="{{route('article', $article->id)}}"><span>{{$article->user->name}} {{$article->user->surname}}</span></a>
                </div>--}}
                <div id="title">Заголовок:
                    <span>{{$article->title}}</span>
                </div>
                <div id="short_text">Короткое содержание:
                    <span>{{$article->short_text}}</span>
                </div>
                <div id="full_text">Полный текст:
                    <span>{{$article->full_text}}</span>
                </div>
                <div id="delete">
                    <div><a href="{{route('article_del',$article->id)}}">Удалить статью</a></div>
                    @if ($article->isPublished == 0)
                    <div><a href="{{route('article_publ',$article->id)}}">Одобрить статью</a></div>
                    @endif
                    <hr>
                </div>
            @endforeach
            <div>
                {{$articles->links()}}
            </div>
         </div>
        </main>
      </div>
    </div>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>    
     @endsection
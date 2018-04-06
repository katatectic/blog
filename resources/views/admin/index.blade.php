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
         
        </main>
      </div>
    </div>    

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>    
  @endsection
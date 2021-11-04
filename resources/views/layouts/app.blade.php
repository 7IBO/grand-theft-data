<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grand-Theft-Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('index') }}">Grand-Theft-Data</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ \Route::current()->getName() == 'index' ? 'active' : '' }}" aria-current="page" href="{{ route('index') }}">
              Accueil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ \Route::current()->getName() == 'posts' ? 'active' : '' }}" aria-current="page" href="{{ route('posts') }}">
              Posts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ \Route::current()->getName() == 'friends' ? 'active' : '' }}" href="{{ route('friends') }}">
              Amis
            </a>
          </li>
          
          @if (\Auth::guest())
            <li class="nav-item">
              <a class="nav-link {{ \Route::current()->getName() == 'auth.login' ? 'active' : '' }}" href="{{route('auth.login')}}">
                Connexion
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ \Route::current()->getName() == 'auth.register' ? 'active' : '' }}" href="{{route('auth.register')}}">
                Inscription
              </a>
            </li>
          @else
            <form action="{{ route('auth.logout') }}" method="post">
              @csrf
              <li class="nav-item">
                <input type="submit" class="nav-link bg-transparent" style="border: none;" value="Déconnexion"/>
              </li>
            </form>
          @endif
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

    @yield('content')

  <footer class="bg-light text-center text-secondary mt-5">

    <div class="text-center p-3">
      © 2020 Copyright:
      <a class="text-dark" href="{{route('index')}}">Grand-Theft-Data.com</a>
    </div>
  </footer>
</body>
</html>
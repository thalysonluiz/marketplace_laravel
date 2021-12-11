<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">MarketPlace</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              @auth

              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link @if (request()->is('admin/stores*'))
                      active
                  @endif" href="{{route('admin.stores.index')}}">Lojas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if (request()->is('admin/products*'))
                      active
                  @endif" href="{{route('admin.products.index')}}">Produtos</a>
                </li>
                <!--<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled">Disabled</a>
                </li>-->
              </ul>
              <div class="d-flex">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link" href="#" onclick="document.querySelector('form.logout').submit()">Sair</a>
                      <form action="{{route('logout')}}" method="POST" style="display: none" class="logout">
                          @csrf
                      </form>
                    </li>
                    <li class="nav-item">
                      <span class="nav-link">{{auth()->user()->name}}</span>
                    </li>
                  </ul>
              </div>
              @endauth
          </div>
        </div>
      </nav>
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>

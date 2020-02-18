<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


    @yield ('head')

    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container">
            <!-- MainLogo leftside -->
            <div class="navbar-brand">
                <img class="CP" src="/images/LogoCP.png">
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- navigation items -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <!-- left navigation links -->
                <ul class="navbar-nav mr-auto">

                    <!-- regular navigation links -->
                    <li class="nav-item">
                        <a class="nav-link" href="/">HOME</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">AGENDA</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">FOTOBOEK</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">PROFIEL</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">BEHEER</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Inloggen') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registreren') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
      </nav>
      <div class="row">
          <div class="col-2 sidebar"></div>
          <div class="col-8 main">
              <div class="mh-100">
                  @yield ('content')
              </div>
          </div>
          <div class="col-2 sidebar"></div>
      </div>
    </body>
</html>


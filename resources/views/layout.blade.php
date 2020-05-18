<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">


    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @yield ('head')

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navigation items -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <img class= "CP navbar-brand" src="/images/LogoCP.png">
                <!-- center navigation links -->
                <ul class="navbar-nav">
                  @foreach(Menu::get(1) as $aMenu)
                    @if (!$aMenu['child'])
                    <li class="nav-item">
                      <a class="nav-link" href="{{ $aMenu['link'] }}">{{ $aMenu['label'] }}</a>
                    </li>
                    @else
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ $aMenu['link'] }}">{{ $aMenu['label'] }}</a>
                        <div class="dropdown-menu">
                          @foreach($aMenu['child'] as $aChild)
                            <a class="dropdown-item" href="{{ $aChild['link'] }}">{{ $aChild['label'] }}</a>
                          @endforeach
                        </div>
                      </li>
                      @endif
                    @endforeach

                    @if(Auth::check())
                        <?php $sRole = Auth::user()->role; ?>
                        @if($sRole == 'admin' || $sRole == 'content-writer')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('management.index') }}">Beheer</a>
                            </li>
                        @endif
                        @if($sRole == 'student')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.index') }}">Profiel</a>
                            </li>
                        @endif
                    @endif
                </ul>
                <form class="form-inline ml-auto" action="{{ route('search.index') }}">
                    <input type="text" name="search" class="form-control mr-sm-2" placeholder="Zoeken" value="{{ request()->search }}">
                    <input type="submit" class="btn btn-outline-light" value="Search">
                </form>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Inloggen</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Registreren
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('register.student') }}">
                                    Studenten
                                </a>
                                <a class="dropdown-item" href="{{ route('register.company') }}">
                                    Bedrijven
                                </a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->firstname }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
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

    <div class="content-container">
        <div class="container">
          <div class="row">
            <div class="col-12">
              @if(Session::has('message'))
                  <p class="alert alert-info">{{ Session::get('message') }}</p>
              @endif
              @if(Session::has('error'))
                <p class="alert alert-warning">{{ Session::get('error') }}</p>
              @endif
            </div>
          </div>
        </div>
        @yield ('content')
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <p class="top-text">Challenge programma</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Over ons</h6>
                    <p class="text-justify">
                        Het Challenge Programma is een groep studenten die zichzelf meer willen ontwikkelen als persoon en als bedrijfskundige.
                        We bieden ze deze mogelijkheid omdat sommigen tijdens hun studie graag alvast een extra goede basis willen leggen voor hun toekomstige carrière.
                        Netwerken, bedrijven bezoeken, je plek vinden of wat meer uitdaging zoeken in je studie, ons brede programma heeft voor ieder wat wils.
                    </p>
                </div>

                <div class="col-xs-6 col-md-3">
                </div>
                <div class="col-xs-6 col-md-3">
                    <h6>Contact informatie</h6>
                    <ul class="footer-links">
                        <li>Challenge programma</li>
                        <li><a href="mailto:Challengeprogramma.bdk.denbosch@avans.nl">Challengeprogramma.bdk.denbosch@avans.nl</a></li>
                        <br>
                        <li>Onderwijsboulevard 215</li>
                        <li>5223DE 'S-Hertogenbosch</li>
                        <hr>
                        <li><a target="_blank" href="https://www.linkedin.com/company/challenge-programma-bdk">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </footer>
  </body>
</html>

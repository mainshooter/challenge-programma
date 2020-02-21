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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


    @yield ('head')

    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container">
            <!-- MainLogo leftside -->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navigation items -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <img class= "  CP navbar-brand" src="/images/LogoCP.png">

                <!-- center navigation links -->
                <ul class="navbar-nav">
                    <!-- regular navigation links -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">HOME</a>
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
            </div>
        </div>

    </nav>


    <div class="content-container">
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
                    <p class="text-justify">Het challenge programma is een studentenvereniging die is opgericht door en voor studenten van de opleiding Bedrijfskunde. Leden die deelnemen aan het Challenge programma kunnen meedoen aan evenementen. Het is een gezellige en snel groeiende studentenvereniging.</p>
                </div>

                <div class="col-xs-6 col-md-3">
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Links</h6>
                    <ul class="footer-links">
                        <li><a href="">Over ons</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="https://www.linkedin.com/company/challenge-programma-bdk">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </footer>
</body>
</html>

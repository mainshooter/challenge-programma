<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
    @yield ('layout')

    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #ca1830">
        <div class="container">
            <!-- MainLogo leftside -->
            <div class="navbar-brand">
                <img class="CP" src="../images/LogoCP.png">
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

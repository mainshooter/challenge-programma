<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <nav class="navbar navbar-expand-sm" style="background-color: #ca1830">

        <!-- MainLogo leftside -->
        <div class="navbar-header">
            <img class="CP" src="../images/LogoCP.png">
        </div>

        <!-- navigation items -->
            <div class="navbar-collapse navbar-collapse" id="navbarCustom">

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

        <!-- right side Logos/Links -->
        <ul class="nav navbar-nav navbar-right">
            <img class="linkedin" href="#" src="../images/linkedin.png">
        </ul>
    </nav>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 main">
            @yield ('content')
        </div>
        <div class="col-2"></div>
    </div>


</body>
</html>

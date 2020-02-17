<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Homepage</title>
    <nav class="navbar navbar-dark bg-primary" style="background-color: #ca1830;">
        <div>
            <div class="navbar-header">
                <img class="CP" src="../images/LogoCP.png">
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">HOMEPAGE</a></li>
                <li><a href="#">AGENDA</a></li>
                <li><a href="#">FOTOBOEK</a></li>
                <li><a href="#">PROFIEL</a></li>
                <li><a href="#">BEHEER</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>

        </div>
        <ul class="nav navbar-nav navbar-right">
            <img class="linkedin" href="#" src="../images/linkedin.png">
        </ul>
    </nav>

</head>
<body>

    <div class="container">
        @yield ('content')
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/carousel.css') }}" >

    <title>Startpagina</title>
</head>
<body>
    <h1> Startpagina </h1>
    <div id="carousel-homepage" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-homepage" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-homepage" data-slide-to="1"></li>
                <li data-target="#carousel-homepage" data-slide-to="2"></li>
                <li data-target="#carousel-homepage" data-slide-to="3"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{$firstimg}}" alt="First Slide">
                </div>
                <div class="carousel-item">
                    <img src="{{$secondimg}}" alt="Second Slide">
                </div>
                <div class="carousel-item">
                    <img src="{{$thirdimg}}" alt="Third Slide">
                </div>
                <div class="carousel-item">
                    <img src="{{$fourthimg}}" alt="Fourth Slide">
                </div>
            </div>

        <a class="carousel-control-prev" href="#carousel-homepage" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-homepage" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

</body>
</html>

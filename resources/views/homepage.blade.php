<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homepage.css') }}" >

    <title>Startpagina</title>
</head>
<body>
    <div class="div">
       <h1> Startpagina </h1>
    </div>
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

    <div class="cards">
        <H3>Wat mensen over ons zeggen: </H3>
        <div class="row">
            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Bedrijf naam</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Naam van reviewer</h6>
                        <p class="card-text">Voorbeeld van wat voor een inhoud een review kan hebben rewwre ww  wewr ewerw erwer .</p>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Bedrijf naam</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Naam van reviewer</h6>
                        <p class="card-text">Voorbeeld van wat voor een inhoud een review kan hebben rewwre ww  wewr ewerw erwer .</p>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Bedrijf naam</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Naam van reviewer</h6>
                        <p class="card-text">Voorbeeld van wat voor een inhoud een review kan hebben rewwre ww  wewr ewerw erwer.</p>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Bedrijf naam</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Naam van reviewer</h6>
                        <p class="card-text">Voorbeeld van wat voor een inhoud een review kan hebben rewwre ww  wewr ewerw erwer .</p>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

</body>
</html>

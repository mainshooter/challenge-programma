<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/maillayout.css') }}">
    @yield('head')
</head>
<body>
<div class="mailDiv">
    @yield('content')
    <hr>
    <p>Challengeprogramma.bdk.denbosch@avans.nl
    <br>
    Onderwijsboulevard 215
    <br>
    5223DE 'S-Hertogenbosch</p>
    <img src="{{ $message->embed(public_path('images/MailBanner.jpg'))}}" class="banner" >
</div>
</body>
</html>

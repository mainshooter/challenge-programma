<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('head')
</head>
<body>
<div>
    @yield('content')
    {{ Illuminate\Mail\Markdown::parse($slot) }}

    {{ $subcopy ?? '' }}
    <hr>
    <p>Challengeprogramma.bdk.denbosch@avans.nl
        <br>
        Onderwijsboulevard 215
        <br>
        5223DE 'S-Hertogenbosch</p>
</div>
</body>
</html>

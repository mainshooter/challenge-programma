<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

</head>

<body>
<div>
    Beste {{ $oUser->firstname }},
    <br>
    <br>
    Hierbij ontvangt u een bevestigingsmail van de acceptatie van uw inschrijving.
    <br>
    U kunt inloggen met het opgegeven E-mail adres en wachtwoord.
    <br>
    <br>
    Met vriendelijke groet,
    <br>
    <br>
    Het Challenge programma
</div>
</body>
</html>

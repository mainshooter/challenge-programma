<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

</head>

<body>
<div>
    Beste {{ $oUser->name }},

    Hierbij ontvangt u een bevestigingsmail van de acceptatie van uw inschrijving.
    U kunt inloggen met het opgegeven E-mail adres en wachtwoord.

    Met vriendelijke groet,

    Het Challenge programma
</div>
</body>
</html>

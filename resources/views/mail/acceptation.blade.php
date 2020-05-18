@extends('mail.template')

@section('content')
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
    <p>Het Challenge programma</p>
@endsection

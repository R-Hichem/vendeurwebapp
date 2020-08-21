@extends('layout')

@section('title')
    Thank You
@endsection

@section('content')
    <h2> Votre commande a bien été enregistré !</h2>
    <h3> un email a été envoyé a l'adresse {{$email}} contenant un code pour tracer votre commande </h3>
@endsection 
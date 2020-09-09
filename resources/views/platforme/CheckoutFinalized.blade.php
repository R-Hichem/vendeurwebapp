@extends('layout')

@section('title')
    Thank You
@endsection

@section('content')
<div class="col-lg-12 col-md-12">
    <h2 style="margin-bottom: 25px"> Votre commande a bien été enregistré !</h2>
    <h3> un email a été envoyé a l'adresse <b> {{$email}} </b> contenant un code pour tracer votre commande </h3>
    <div style="margin-top: 25px">
            <a href="/order_status" class="primary-btn" style="border-radius:20px">Consulter la commande</a>
    </div>
</div>
@endsection 
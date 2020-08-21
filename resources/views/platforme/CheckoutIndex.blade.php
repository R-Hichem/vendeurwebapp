@extends('layout')

@section('title')
    checkout
@endsection

@section('content')
    <h2> Fill your informations  stplz</h2>
    <div >
        <form action="/checkout_finalize" method="POST">
            @csrf
            Name: <input type="text" name="name"> <br>
            Email: <input type="email" name="email"> <br>
            Email: <input type="email" name="email_confirmation"> <br>
            adresse : <input type="text" name="adresse"> <br>
            <button type="submit">Finaliser la commande</button>
        </form>
    </div>
@endsection 
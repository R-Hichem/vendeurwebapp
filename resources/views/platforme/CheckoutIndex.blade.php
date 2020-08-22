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

            @error('name')
               <p style="color:red"> {{$message}} </p> <br>
            @enderror
            
            Email: <input type="email" name="email"> <br>
            @error('email')
               <p style="color:red"> {{$message}} </p> <br>
            @enderror

            Email: <input type="email" name="email_confirmation"> <br>
            @error('email_confirmation')
               <p style="color:red"> {{$message}} </p> <br>
            @enderror

            adresse : <input type="text" name="adresse"> <br>
            @error('adresse')
               <p style="color:red"> {{$message}} </p> <br>
            @enderror

            <button type="submit">Finaliser la commande</button>
        </form>
    </div>
@endsection 
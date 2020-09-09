@extends('layout')

@section('title')
    Suivi de commande
@endsection

@section('content')
<div style="display:flex;justify-content: center; flex-direction:column; align-content:center">
    <h2>Suivez votre commande !</h2>
    <div class="ecommerce_container">
        <form action="/order_status" method="POST">
            @csrf
            Code commande <input type="text" name="code"> <br>
            @error('code')
            <p style="color:red"> {{$message}} </p>
            @enderror
            <button type="submit">OK</button>
        </form>
    </div>
</div>
@endsection 
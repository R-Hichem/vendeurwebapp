@extends('layout')

@section('title')
    Suivi de commande
@endsection

@section('content')
<div style="display:flex;justify-content: center; flex-direction:column; align-content:center">
    <h2 style="margin-bottom: 25px">Suivez votre commande !</h2>
    <div class="ecommerce_container" >
        <form action="/order_status" method="POST" >
            @csrf
            Code commande <input type="text" name="code"> <br>
            @error('code')
            <p style="color:red"> {{$message}} </p>
            @enderror
             <div>
                        <button type="submit" style="border: none; background: none; margin-top:25px; color: white">
                            <a class="primary-btn" style="border-radius:20px">OK</a>
                        </button>
                    </div>
        </form>
    </div>
</div>
@endsection 
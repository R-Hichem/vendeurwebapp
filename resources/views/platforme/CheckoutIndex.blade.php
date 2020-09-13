@extends('layout')

@section('title')
    checkout
@endsection

@section('content')
    {{-- <h2> Fill your informations  stplz</h2>
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
    </div> --}}
   
<div class="row" style="margin:50px">
    <div class="col-lg-12">
        <h2 > Finaliser la commande</h2>
    </div>
</div>
    
<div class="row">
    <div class="col-lg-12">
        <form action="/checkout_finalize" method="POST">
            @csrf
        <div class="checkout__form__input">
            <p>Nom et Prénom <span>*</span></p>
            <input type="text" name="name" value="{{old('name')}}">
        </div>
          @error('name')
               <p style="color:red"> {{$message}} </p> <br>
            @enderror
        <div class="checkout__form__input">
            <p>Email <span>*</span></p>
            <input type="text" name="email" value="{{old('email')}}">
        </div>
          @error('email')
               <p style="color:red"> {{$message}} </p> <br>
            @enderror
        <div class="checkout__form__input">
            <p>Confirmez votre Email<span>*</span></p>
            <input type="text" name="email_confirmation" value="{{old('email_confirmation')}}">
        </div>
          @error('email_confirmation')
               <p style="color:red"> {{$message}} </p> <br>
            @enderror
        <div class="checkout__form__input">
            <p>adresse <span>*</span></p>
            <input type="text" name="adresse"  value="{{old('adresse')}}">
        </div>
          @error('adresse')
               <p style="color:red"> {{$message}} </p> <br>
            @enderror
             <div>
                        <button type="submit" style="border: none; background: none; margin-top:25px; color: white">
                            <a class="primary-btn" style="border-radius:20px">Finaliser la Commande</a>
                        </button>
                    </div>
            
        </form>
    </div>
</div>
@endsection 
@extends('layout')

@section('title')
    My Cart
@endsection

@section('content')
    <h2> MY CART </h2>
  
    <div class="ecommerce_container">
        <ul>
            @foreach ($products as $product)
            <li style="padding: 10; border: black 1px solid"> 
                <div> {{$product->name}} x {{$product->quantity}}  {{$product->quantity * $product->associatedModel->unit_price}} DZD </div>
            </li>
            @endforeach
            <h2>TOTAL : {{$total}} DZD </h2>
        </ul>

        @if (!$isEmpty)
        <form action="/checkout" method="POST" >
            @csrf
            <button type="submit">GO TO CHECKOUT</button>  
        </form>
        @endif
    </div>
@endsection 
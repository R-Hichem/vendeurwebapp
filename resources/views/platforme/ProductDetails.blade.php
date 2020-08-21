@extends('layout')

@section('title')
    {{$product->name}}
@endsection

@section('content')
    <h2> {{$product->name}} Details</h2>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="ecommerce_container">
        <ul>
            <li> {{$product->name}} </li>
            <li> {{$product->unit_price}} </li>
            @if ($product->quantity > 0)
            <li style="color:green"> DISPONIBLE</li>
            @else
            <li style="color:red">!!!!!!! NON DISPONIBLE !!!!!!!</li>
            @endif
            <form action="/addtocart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="number" name="quantity" min="0" value="1">
                <button type="submit">Add to cart</button>
            </form>
        </ul>
    </div>
@endsection 
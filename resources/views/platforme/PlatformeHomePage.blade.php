@extends('layout')

@section('title')
    Acceuil
@endsection

@section('content')
    <h2>bienvenu</h2>
    <div class="ecommerce_container">
        @foreach ($products as $product)
    <a href="/products/{{$product->id}}"> {{ $product->name }} </a> <br>
        @endforeach
    </div>
    {{ $products->links() }}
@endsection 
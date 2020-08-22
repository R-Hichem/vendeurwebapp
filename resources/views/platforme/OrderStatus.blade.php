@extends('layout')

@section('title')
    Commande {{$order->code}}
@endsection

@section('content')
    <h2>Information de la commande  {{$order->code}} </h2>
    <div class="ecommerce_container">
         <div class="ecommerce_container">
        <ul>
            <li> {{$order->client_name}} </li>
            <li> {{$order->adresse}} </li>
            <li> <h3>éta du payement</h3> </li>
            @if ($order->payed)
            <li style="color:green"> payé </li>
            @else
            <li style="color:red"> non payé</li>
            @endif

            <li> <h3>éta de la livraison</h3> </li>

            @if ($order->shipped)
            <li style="color:green"> livré </li>
            @else
            <li style="color:red"> non livré</li>
            @endif

            <h2>Détailles de la commande</h2>
            @foreach ($order_products as $order_product)
            <ul>
                <li>
                   Nom Produit {{$order_product->product()->name}} 
                </li>
                <br>
                
                <li>
                   Quantité {{$order_product->quantity}} 
                </li>
                <br>
                
                <li>
                   Prix unitaire : {{$order_product->product()->unit_price}}  DZD
                </li>
                <br>
                
                <hr>
            </ul>
            @endforeach
        </ul>

        <h2>Total {{$order->getTotalOrder()}} DZD </h2>
    </div>
    </div>
@endsection 
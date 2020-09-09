@extends('layout')

@section('title')
    Commande {{$order->code}}
@endsection

@section('content')
<div>
    <h2>Information de la commande <b> {{$order->code}}</b> </h2>
    <div class="ecommerce_container">
         <div class="ecommerce_container">
        <ul >
            <div style="padding: 20px 0">
                <li> <h5>Client: {{$order->client_name}}</h5> </li>
                <li> <h5>Adresse: {{$order->adresse}}</h5> </li>
            </div>
                 <h3>Eta du paiement</h3> 
            <div style="padding: 20px 0">
            @if ($order->payed)
            <li style="color:green"> payé </li>
            @else
            <li style="color:red"> non payé</li>
            @endif
            </div>
            <h3>Eta de la livraison</h3> 
            <div style="padding: 20px 0">
            @if ($order->shipped)
            <li style="color:green"> livré </li>
            @else
            <li style="color:red"> non livré</li>
            @endif
            </div>
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
    </div>
@endsection 
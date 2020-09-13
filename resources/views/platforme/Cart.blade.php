@extends('layout')

@section('title')
    My Cart
@endsection

@section('content')
    {{-- <h2> MY CART </h2>
  
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
            <a href="/checkout">GO TO CHECKOUT</a>  
        @endif
    </div> --}}

    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                @if (!$isEmpty)
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix Unitaire</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="{{$product->associatedModel->image_url}}" alt="" style="width: 90px; height:90px">
                                        <div class="cart__product__item__title">
                                            <h6>{{$product->name}}</h6>
                                            
                                        </div>
                                    </td>
                                    <td class="cart__price">{{$product->associatedModel->unit_price}} DZD</td>
                                    <td {{--class="cart__quantity"--}} class="cart__total">
                                        {{$product->quantity}}
                                    </td>
                                    <td class="cart__total"> {{$product->quantity * $product->associatedModel->unit_price}} DZD</td>
                                    {{-- <td class="cart__close"><span class="icon_close"></span></td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="/">Retour Au Magasin</a>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-6">
                   
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Total Panier</h6>
                        <ul>
                            <li>Total <span> {{$product->quantity * $product->associatedModel->unit_price}} DZD </span></li>
                        </ul>
                        <a href="/checkout" class="primary-btn">Finaliser la Commande</a>
                    </div>
                </div>
            </div>
        @else
        <div class="row" style="display:flex; justify-content:center">
            <h1 style="padding:50px">Votre pannier est vide</h1>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="/">Retour Au Magasin</a>
                </div>
            </div>
        </div>
        @endif
        </div>
    </section>
@endsection 
@extends('layout')

@section('title')
    {{$product->name}}
@endsection

@section('content')
    {{-- <h2> {{$product->name}} Details</h2>
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
    </div> --}}

    <section class="product-details spad">
        <div class="container">
            @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll" tabindex="1" style="overflow-y: hidden; outline: none;">
                            <a class="pt active" href="#product-1">
                                <img src="/img/product/details/thumb-1.jpg" alt="">
                            </a>
                            <a class="pt" href="#product-2">
                                <img src="/img/product/details/thumb-2.jpg" alt="">
                            </a>
                            <a class="pt" href="#product-3">
                                <img src="/img/product/details/thumb-3.jpg" alt="">
                            </a>
                            <a class="pt" href="#product-4">
                                <img src="/img/product/details/thumb-4.jpg" alt="">
                            </a>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel owl-loaded">
                                
                                
                                
                                
                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1652px;"><div class="owl-item active" style="width: 412.9px;"><img data-hash="product-1" class="product__big__img" src="/img/product/details/product-1.jpg" alt=""></div><div class="owl-item" style="width: 412.9px;"><img data-hash="product-2" class="product__big__img" src="/img/product/details/product-3.jpg" alt=""></div><div class="owl-item" style="width: 412.9px;"><img data-hash="product-3" class="product__big__img" src="/img/product/details/product-2.jpg" alt=""></div><div class="owl-item" style="width: 412.9px;"><img data-hash="product-4" class="product__big__img" src="/img/product/details/product-4.jpg" alt=""></div></div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="arrow_carrot-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="arrow_carrot-right"></i></button></div><div class="owl-dots disabled"></div></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}}<span>Vendeur: //TODO</span></h3>
                        
                        <div class="product__details__price">{{$product->unit_price}} DZD </div>
                        <p>Nemo enim ipsam voluptatem quia aspernatur aut odit aut loret fugit, sed quia consequuntur
                        magni lores eos qui ratione voluptatem sequi nesciunt.</p>
                        <div class="product__details__button">
                                <form action="/addtocart" method="POST" id="addtocartform">
                @csrf
                            <div class="quantity">
                                <span>Quantité:</span>
                                <div class="pro-qty">
                                    <span class="dec qtybtn">-</span>
                                    <input value="1" type="number" name="quantity" min="0" value="1">
                                <span class="inc qtybtn"> + </span>
                            </div>
                            </div>
                        
                <a href="#" class="cart-btn"  onclick="document.querySelector('#addtocartform').submit()"><span class="icon_bag_alt" ></span> Add to cart</a>
                <input type="hidden" name="product_id" value="{{$product->id}}">
                {{-- <input type="number" name="quantity" min="0" value="1"> --}}
            </form>
                           
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Disponibilité:</span>
                                    <div for="stockin">
                                        In Stock
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
@endsection 
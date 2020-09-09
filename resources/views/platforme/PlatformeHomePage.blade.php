@extends('layout')

@section('title')
    Acceuil
@endsection

@section('content')
    
    @foreach ($products as $product)
        
    <div class="col-lg-4 col-md-6">
        <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="img/shop/shop-1.jpg">
                <ul class="product__hover">
                    {{-- <li><a href="img/shop/shop-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                    <li><a href="#"><span class="icon_heart_alt"></span></a></li> --}}
                    <li><a href="/products/{{$product->id}}"><span class="icon_bag_alt"></span></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <h6><a href="#">{{$product->name}}</a></h6>
                <div class="product__price">{{$product->unit_price}} DZD</div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-lg-12 text-center">
        <div class="pagination__option">
            {{-- <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fa fa-angle-right"></i></a> --}}
        {{$products->links()}}
        </div>
    </div>
                        
@endsection 
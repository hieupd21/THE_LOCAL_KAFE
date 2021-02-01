@extends('master')
@section('title', 'LOẠI SẢN PHẨM')
@section('content')
@include('layouts.slide')
<div class="container Content">
    <div class="row my-5">
        @include('layouts.product_categories')

        <div class="col-9 d-flex flex-wrap">

            <div class="col-md-12 mb-3 text-center animate__animated animate__fadeInRight">
                <div class="title d-inline-block">
                    <h1 class="text-only font-weight-bold text-uppercase border-b">{{$cate_name->cate_name}}</h1>
                </div>
            </div>

            @foreach ($products as $item)
            <div class="col-md-4 my-5 Products_row_col-4 animate__animated animate__fadeInUp">
                <div class="product-top Products_row_col-4_product-top text-center">
                    <img class="img Products_row_col-4_product-top_img" src="{{ asset('/storage/'.$item->prod_image) }}">
                    <div
                        class="overlay Products_row_col-4_product-top_overlay d-flex flex-column justify-content-center">
                        <a class="btn btn-lightpurple my-2 rounded-0" href="">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="btn btn-lightpurple my-2 rounded-0" href="">
                            <i class="fas fa-heart"></i>
                        </a>
                        <a class="btn btn-lightpurple my-2 rounded-0" href="">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    </div>
                </div>
                <div class="product-bottom text-center mt-4">
                    <a class="text-decoration-none" href="{{route('home.proddetail', $item->prod_id)}}">
                        <h5 class="m-0 text-lightpurple text-uppercase font-weight-bold">{{$item->prod_name}}</h5>
                    </a>
                    <p class="m-0 text-success font-weight-bold">$&nbsp{{number_format($item->prod_price,2)}}</p>
                </div>
            </div>
            @endforeach

            <div class="col-12 d-flex justify-content-center animate__animated animate__fadeInUp">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>    
@endsection
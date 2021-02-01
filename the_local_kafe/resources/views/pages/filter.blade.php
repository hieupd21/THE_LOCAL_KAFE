@extends('master')
@section('title', 'LỌC GIÁ')
@section('content')
@include('layouts.slide')
<div class="container Content">
    <div class="row my-5">
        @include('layouts.product_categories')

        <div class="col-9 d-flex flex-wrap">

            <div class="col-md-12 animate__animated animate__fadeInRight">
                <div class="title">
                    <h4 class="font-weight-bold text-uppercase">BỘ LỌC GIÁ TỪ <span class="text-success">$&nbsp0</span> ĐẾN 
                        <span class="text-success">$&nbsp{{ $price }}</span>
                    </h4>
                </div>
                <div class="show">
                    <h5 class="text-uppercase text-only font-weight-bold">LỌC ĐƯỢC {{ $count }} SẢN PHẨM</h5>
                </div>
            </div>

            @if ($count > 0)
            @foreach ($prod as $item)
            <div class="col-md-4 my-5 Products_row_col-4 animate__animated animate__fadeInUp">
                <div class="product-top Products_row_col-4_product-top text-center">
                    <img class="img Products_row_col-4_product-top_img"
                        src="{{ asset('/storage/'.$item->prod_image) }}">
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
            @else
            <div class="col-12 animate__animated animate__fadeInUp">
                <img src="frontend/img/16.png" width="100%">
            </div>
            @endif
            
        </div>
    </div>
</div>
@endsection
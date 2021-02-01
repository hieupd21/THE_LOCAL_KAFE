@extends('master')
@section('title', 'TRANG CHỦ')
@section('content')
@include('layouts.slide')

<div class="container Content">
    <div class="row my-5">
        @include('layouts.product_categories')

        <div class="col-9 d-flex flex-wrap">
            <div class="col-md-12 py-4 mb-4 bg-whitesmoke d-flex justify-content-between align-items-center">
                <div class="show">
                    <p class="m-0 text-only text-uppercase font-weight-bold ml-3">ĐANG CÓ {{$prod_count}} SẢN PHẨM</p>
                </div>
                <div class="sort">
                    <div class="dropdown">
                        <a class="mr-3 text-black d-flex justify-content-between align-items-center" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p class="m-0 mr-3 text-only">Default sorting</p>
                            <i class="fas fa-angle-down text-only"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">
                                <small>Sort by price: Low to High</small>
                            </a>
                            <a class="dropdown-item" href="#">
                                <small>Sort by price: High to Low</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 my-3 text-center">
                <div class="title">
                    <h2 class="text-orange font-weight-bold text-only text-uppercase">SẢN PHẨM TIÊU BIỂU</h2>
                </div>
            </div>

            @foreach ($prod_feat as $item)
            <div class="col-md-4 my-5 Products_row_col-4">
                @if ($item->prod_quantity > 0)
                <div class="badge Products_row_col-4_badge d-flex flex-column align-items-center bg-cream">
                    <small class="font-weight-bold text-black d-flex flex-wrap text-white mb-1 font-italic">SẢN PHẨM</small>
                    <small class="font-weight-bold text-black d-flex flex-wrap text-white font-italic">TIỀM NĂNG</small>
                </div>
                @else
                <div class="badge Products_row_col-4_badge d-flex flex-column align-items-center bg-danger">
                    <small class="font-weight-bold text-black d-flex flex-wrap text-white font-italic">HẾT HÀNG</small>
                </div>
                @endif
                <div class="product-top Products_row_col-4_product-top text-center">
                    <img class="img Products_row_col-4_product-top_img"
                        src="{{ asset('/storage/'.$item->prod_image) }}">
                    <div
                        class="overlay Products_row_col-4_product-top_overlay d-flex flex-column justify-content-center">
                        <a class="btn btn-lightpurple my-2 rounded-0"
                            href="{{ route('home.proddetail', $item->prod_id) }}">
                            <i class="fas fa-eye"></i>
                        </a>

                        {{-- <a class="btn btn-lightpurple my-2 rounded-0" href="">
                            <i class="fas fa-star"></i>
                        </a> --}}

                        @if ($item->prod_quantity > 0)
                        <a class="btn btn-lightpurple my-2 rounded-0"
                            href="{{ route('cart.quickadd', $item->prod_id) }}">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="product-bottom text-center mt-4">
                    <a class="text-decoration-none" href="{{ route('home.proddetail', $item->prod_id) }}">
                        <h5 class="m-0 text-lightpurple text-uppercase font-weight-bold">{{$item->prod_name}}</h5>
                    </a>
                    @if ($item->prod_discount == 0)
                    <p class="m-0 text-success font-weight-bold">$&nbsp{{number_format($item->prod_price, 2)}}</p>
                    @else
                    <?php
                        $money = $item->prod_price*(100-$item->prod_discount)/100;
                    ?>
                    <div class="d-flex justify-content-center">
                        <p class="m-0 text-secondary font-weight-bold mr-2">
                            <strike>$&nbsp{{number_format($item->prod_price, 2)}}</strike></p>
                        <p class="m-0 text-danger font-weight-bold">$&nbsp{{number_format($money, 2)}}</p>
                    </div>
                    @endif

                </div>
            </div>
            @endforeach

            <div class="col-md-12 my-3 text-center">
                <div class="title">
                    <h2 class="text-orange font-weight-bold text-only text-uppercase">TẤT CẢ SẢN PHẨM</h2>
                </div>
            </div>

            @foreach ($prod as $item)
            <div class="col-md-4 my-5 Products_row_col-4">
                @if ($item->prod_quantity < 1) <div
                    class="badge Products_row_col-4_badge d-flex flex-column align-items-center bg-danger">
                    <small class="font-weight-bold text-black d-flex flex-wrap text-white font-italic">BÁN HẾT</small>
            </div>
            @endif
            <div class="product-top Products_row_col-4_product-top text-center">
                <img class="img Products_row_col-4_product-top_img" src="{{ asset('/storage/'.$item->prod_image) }}">
                <div class="overlay Products_row_col-4_product-top_overlay d-flex flex-column justify-content-center">
                    <a class="btn btn-lightpurple my-2 rounded-0" href="{{ route('home.proddetail', $item->prod_id) }}">
                        <i class="fas fa-eye"></i>
                    </a>

                    {{-- <a class="btn btn-lightpurple my-2 rounded-0" href="">
                        <i class="fas fa-star"></i>
                    </a> --}}

                    @if ($item->prod_quantity > 0)
                    <a class="btn btn-lightpurple my-2 rounded-0" href="{{ route('cart.add', $item->prod_id) }}">
                        <i class="fas fa-shopping-bag"></i>
                    </a>
                    @else
                    <a class="btn btn-lightpurple my-2 rounded-0 d-none" href="{{ route('cart.add', $item->prod_id) }}">
                        <i class="fas fa-shopping-bag"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="product-bottom text-center mt-4">
                <a class="text-decoration-none" href="{{ route('home.proddetail', $item->prod_id) }}">
                    <h5 class="m-0 text-lightpurple text-uppercase font-weight-bold">{{$item->prod_name}}</h5>
                </a>
                <p class="m-0 text-success font-weight-bold">$&nbsp{{number_format($item->prod_price, 2)}}</p>
            </div>
        </div>
        @endforeach

        <div class="col-12 d-flex justify-content-center">
            {!! $prod->render() !!}
        </div>

    </div>
</div>
</div>
@endsection
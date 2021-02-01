@extends('master')
@section('title', 'TÌM KIẾM')
@section('content')
@include('layouts.slide')
<div class="container">
    <div class="row my-5">
        @include('layouts.product_categories')
        <div class="col-9 d-flex flex-wrap">
            <div class="col-12">
                <div class="title">
                    <h4 class="font-weight-bold text-uppercase">TÌM KIẾM VỚI TỪ KHÓA:
                        <span class="text-only">{{ $keyword }}</span>
                    </h4>
                </div>
                <div class="show">
                    <h5 class="text-uppercase text-only font-weight-bold">TÌM ĐƯỢC {{ $count }} SẢN PHẨM</h5>
                </div>
            </div>

            @foreach ($prod as $item)
            <div class="col-md-4 my-5 Products_row_col-4">
                @if ($item->prod_quantity < 1)
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

                        <a class="btn btn-lightpurple my-2 rounded-0" href="">
                            <i class="fas fa-star"></i>
                        </a>

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

        </div>
    </div>
</div>
@endsection
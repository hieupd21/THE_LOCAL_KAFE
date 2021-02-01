@extends('master')
@section('title', 'GIỎ HÀNG')
@section('content')
<div class="container Banner">
    <div class="row">
        <div class="col-12 p-0">
            <div class="img d-flex justify-content-center align-items-center">
                <h1 class="font-weight-bold pt-5 pb-3 text-only font-lg pointer animate__animated animate__fadeInDown">
                    GIỎ HÀNG
                </h1>
            </div>
        </div>
    </div>
</div>

@if (Cart::count()>=1)
<div class="container Content">
    <div class="row mb-5">
        <div class="col-12 animate__animated animate__fadeInLeft">
            <table class="table table-bordered">
                <thead class="thead-dark text-only text-center">
                    <tr>
                        <th scope="col">HÀNH ĐỘNG</th>
                        <th scope="col">SẢN PHẨM</th>
                        <th scope="col">GIÁ</th>
                        <th scope="col">SỐ LƯỢNG</th>
                        <th scope="col">THÀNH TIỀN</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($cart as $item)
                    <tr>
                        <th>
                            <a class="text-danger text-decoration-none" href="{{ route('cart.delete', $item->rowId) }}">
                                <i class="fas fa-times-circle"></i>
                            </a>
                        </th>
                        <td>
                            <div class="product d-flex">
                                <div class="img Content_row_col-12_table_product_img">
                                    <img class="pic Content_row_col-12_table_product_img_pic"
                                        src="{{ asset('/storage/'.$item->options->image) }}">
                                </div>
                                <div class="info Content_row_col-12_table_product_info">
                                    <a class="m-0 text-decoration-none"
                                        href="{{ route('home.proddetail', $item->id) }}">
                                        <h6 class="text-lightpurple font-weight-bold text-uppercase">{{$item->name}}
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="text-success font-weight-bold">
                            <h5>
                                @if ($item->options->discount == 0)
                                <span
                                    class="text-success font-weight-bold">$&nbsp</span>{{number_format($item->price, 2)}}
                                @else
                                <?php
                                    $money = $item->price*(100-$item->options->discount)/100;
                                ?>
                                <span class="text-success font-weight-bold">$&nbsp</span>{{number_format($money, 2)}}
                                @endif
                            </h5>
                        </td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST"
                                class="d-flex justify-content-center align-items-center">
                                @csrf
                                @if ($item->qty >= $item->options->maxQty)
                                <input type="number" step="1" min="1" max="{{$item->options->maxQty}}" size="3" name="quantity"
                                    class="text-only text-center font-weight-bold py-1" value="{{$item->options->maxQty}}">
                                <input type="hidden" name="rowId" value="{{$item->rowId}}">  
                                @else
                                <input type="number" step="1" min="1" max="{{$item->options->maxQty}}" size="3" name="quantity"
                                    class="text-only text-center font-weight-bold py-1" value="{{$item->qty}}">
                                <input type="hidden" name="rowId" value="{{$item->rowId}}">   
                                @endif      
                                <button
                                    class="btn btn-lightpurple rounded-0 font-weight-bold ml-1 animate__animated animate__fadeInRight">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>

                        </td>
                        <td class="text-success font-weight-bold">
                            <h5>
                                @if ($item->options->discount == 0)
                                <span
                                    class="text-success font-weight-bold">$&nbsp</span>{{number_format($item->price*$item->qty, 2)}}
                                @else
                                <?php
                                    $money = $item->price*(100-$item->options->discount)/100;
                                ?>
                                <div class="d-flex justify-content-center">
                                    <span
                                        class="text-success font-weight-bold">$&nbsp</span>{{number_format($money*$item->qty, 2)}}
                                </div>
                                @endif
                            </h5>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr class="border">
        </div>

        <div class="col-12 text-right justify-content-between d-flex justify-content-between ml-3">

            <a class="btn btn-secondary mr-3 rounded-0 font-weight-bold animate__animated animate__fadeInLeft"
                href="{{route('home')}}">
                TIẾP TỤC MUA SẮM
            </a>
        </div>
    </div>
</div>

<div class="container Cart-Total">
    <div class="row justify-content-end mb-5">
        <div class="col-5 card pb-4 pt-2 animate__animated animate__fadeInUp">
            <h4 class="m-0 font-weight-bold text-secondary border-bottom p-3">TỔNG GIỎ HÀNG</h4>
            <div class="total d-flex justify-content-between align-items-center p-3 border-bottom">
                <h5 class="m-0 text-secondary font-weight-bold">GIÁ TIỀN</h5>
                <h5 class="m-0 text-success font-weight-bold">$&nbsp{{ number_format($subtotal, 2) }}</h5>
            </div>
            <div class="total d-flex justify-content-between align-items-center p-3 border-bottom">
                <h5 class="m-0 text-secondary font-weight-bold">THUẾ</h5>
                <h5 class="m-0 text-success font-weight-bold">$&nbsp{{ $tax }}</h5>
            </div>
            <div class="total d-flex justify-content-between align-items-center p-3 border-bottom">
                <h5 class="m-0 text-secondary font-weight-bold">TỔNG TIỀN</h5>
                <h5 class="m-0 text-success font-weight-bold">$&nbsp{{ $total }}</h5>
            </div>
            <a class="btn btn-block btn-lightpurple mt-3 font-weight-bold rounded-0" href="{{ route('checkout.index') }}">
                TIẾN HÀNH THANH TOÁN
            </a>
        </div>
    </div>
</div>
@else
<div class="container Content">
    <div class="row mb-5">
        <div class="col-12 animate__animated animate__fadeInLeft text-center">
            <img src="frontend/img/empty-cart.png" width="50%">
            <h3 class="text-only font-weight-bold text-uppercase">GIỎ HÀNG CỦA BẠN ĐANG TRỐNG</h3>
        </div>
    </div>
</div>
@endif
@endsection
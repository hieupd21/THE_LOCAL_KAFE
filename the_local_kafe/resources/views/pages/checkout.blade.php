@extends('master')
@section('title', 'THANH TOÁN')
@section('content')
<div class="container Banner">
    <div class="row">
        <div class="col-12 p-0">
            <div class="img d-flex justify-content-center align-items-center Banner_row_col-12_img"
                style="background-image: url('frontend/img/checkout.jpg')">
                <h1 class="font-weight-bold text-only font-lg pointer animate__animated animate__fadeInDown">
                    THANH TOÁN
                </h1>
            </div>
        </div>
    </div>
</div>

@if (Cart::count() >= 1)
<div class="container">
    <div class="row mt-4">
        <div class="col-4 animate__animated animate__fadeInUp">
            <div class="d-flex justify-content-center">
                <h5 class="m-0 font-weight-bold text-only text-uppercase text-center border-b">THÔNG TIN KHÁCH HÀNG</h5>
            </div>
            <form action="{{ route('checkout.add') }}" method="POST">
                @csrf
                <div class="form-group mt-3 d-flex">
                    <p class="m-0 text-only text-uppercase font-weight-bold col-6">TÊN: </p>
                    <p class="m-0 col-6">{{Auth::user()->name}}</p>
                </div>
                <div class="form-group mt-3 d-flex">
                    <p class="m-0 text-only text-uppercase font-weight-bold col-6">Email: </p>
                    <p class="m-0 col-6">{{Auth::user()->email}}</p>
                </div>
                <div class="form-group mt-3 d-flex">
                    <p class="m-0 text-only text-uppercase font-weight-bold col-6">SỐ ĐIỆN THOẠI: </p>
                    <p class="m-0 col-6">{{Auth::user()->phone}}</p>
                </div>
                <div class="form-group mt-3">
                    <input type="hidden" class="form-control rounded-0" name="user" value="{{Auth::user()->id}}">
                </div>
                <div class="form-group mt-3">
                    <input type="hidden" class="form-control rounded-0" name="total" value="{{ $total }}">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control rounded-0" name="address" placeholder="ĐỊA CHỈ">
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="description" rows="3"
                        placeholder="MÔ TẢ"></textarea>
                </div>
                <button class="btn-btn btn-block btn-lightpurple font-weight-bold text-uppercase rounded-0">
                    HOÀN THÀNH THANH TOÁN
                </button>
            </form>

            <div class="d-flex flex-column align-items-center">
                <h5 class="m-0 font-weight-bold text-only text-uppercase text-center mt-5 border-b d-inline-block">
                    PHƯƠNG THỨC THANH TOÁN
                </h5>
            </div>
            <div class="form-check mt-3 text-center">
                <input class="form-check-input" type="radio" name="gridRadios" value="option1" checked>
                <label class="form-check-label font-weight-bold text-uppercase ml-2">
                    THANH TOÁN KHI NHẬN HÀNG (COD) <span class="text-danger">(DUY NHẤT)</span>
                </label>
            </div>

        </div>

        <div class="col-8 animate__animated animate__fadeInUp d-flex flex-column align-items-center">
            <div class="d-flex justify-content-center">
                <h5 class="m-0 font-weight-bold text-only text-uppercase text-center border-b">TỔNG QUAN VỀ ĐƠN HÀNG</h5>
            </div>

            <table class="table table-bordered mt-3">
                <thead class="thead-dark text-only text-center">
                    <tr>
                        <th scope="col">SẢN PHẨM</th>
                        <th scope="col">GIÁ</th>
                        <th scope="col">SỐ LƯỢNG</th>
                        <th scope="col">THÀNH TIỀN</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($cart as $item)
                    <tr>
                        <td>
                            <div class="product d-flex">
                                <div class="img Content_row_col-12_table_product_img">
                                    <img class="pic Content_row_col-12_table_product_img_pic"
                                        src="{{ asset('/storage/'.$item->options->image) }}">
                                </div>
                                <div class="info Content_row_col-12_table_product_info ml-2">
                                    <a class="m-0 text-decoration-none"
                                        href="{{ route('home.proddetail', $item->id) }}">
                                        <h6 class="text-lightpurple font-weight-bold text-uppercase">{{$item->name}}
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="text-success font-weight-bold">
                            <h6 class="text-success font-weight-bold">
                                @if ($item->options->discount == 0)
                                $&nbsp{{number_format($item->price, 2)}}
                                @else
                                <?php
                                    $money = $item->price*(100-$item->options->discount)/100;
                                ?>
                                $&nbsp{{number_format($money, 2)}}
                                @endif
                                </h6>
                        </td>
                        <td>
                            <h6 class="m-0 text-only text-center font-weight-bold">x {{$item->qty}}</h6>
                        </td>
                        <td class="text-success font-weight-bold">
                            <h6 class="text-success font-weight-bold">
                                @if ($item->options->discount == 0)
                                $&nbsp{{number_format($item->price*$item->qty, 2)}}
                                @else
                                <?php
                                    $money = $item->price*(100-$item->options->discount)/100;
                                ?>
                                $&nbsp{{number_format($money*$item->qty, 2)}}
                                @endif
                            </h6>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                <h5 class="m-0 font-weight-bold text-only border-b">TỔNG GIỎ HÀNG</h5>
            </div>
            <div class="mt-3 col-6">
                <div class="total d-flex justify-content-between align-items-center p-3 border-bottom">
                    <h6 class="m-0 text-secondary font-weight-bold">GIÁ TIỀN</h6>
                    <h6 class="m-0 text-success font-weight-bold">$&nbsp{{ $subtotal }}</h6>
                </div>
                <div class="total d-flex justify-content-between align-items-center p-3 border-bottom">
                    <h6 class="m-0 text-secondary font-weight-bold">THUẾ</h6>
                    <h6 class="m-0 text-success font-weight-bold">$&nbsp{{ $tax }}</h6>
                </div>
                <div class="total d-flex justify-content-between align-items-center p-3 border-bottom">
                    <h6 class="m-0 text-secondary font-weight-bold">TỔNG TIỀN</h6>
                    <h6 class="m-0 text-success font-weight-bold">$&nbsp{{ $total }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container Content">
    <div class="row mb-5">
        <div class="col-12 animate__animated animate__fadeInLeft text-center">
            <img src="frontend/img/4-03.png" width="30%">
            <h3 class="text-only font-weight-bold text-uppercase">BẠN KHÔNG THỂ THANH TOÁN KHI GIỎ HÀNG ĐANG TRỐNG</h3>
        </div>
    </div>
</div>
@endif
@endsection
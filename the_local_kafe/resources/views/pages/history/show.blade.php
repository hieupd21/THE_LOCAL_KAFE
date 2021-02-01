@extends('master')
@section('title', 'ĐƠN HÀNG')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="my-4 text-uppercase font-weight-bold text-only text-center">
                ĐƠN HÀNG: {{$number->order_id}}
            </h1>
            <a class="btn btn-danger mr-3 rounded-0 font-weight-bold text-uppercase"
                href="{{route('history.index')}}">
                QUAY LẠI
            </a>
            <table class="table table-bordered mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-uppercase text-center" scope="col">SẢN PHẨM</th>
                        <th class="text-uppercase text-center" scope="col">SỐ LƯỢNG</th>
                        <th class="text-uppercase text-center" scope="col">GIÁ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $value)
                    <tr class="text-center">
                        <td>
                            <div class="product d-flex">
                                <div class="img Content_row_col-12_table_product_img">
                                    <img class="pic Content_row_col-12_table_product_img_pic"
                                        src="{{ asset('/storage/'.$value->prod_image) }}">
                                </div>
                                <div class="info Content_row_col-12_table_product_info">
                                    <a class="m-0 text-decoration-none"
                                        href="{{ route('home.proddetail', $value->prod_id) }}">
                                        <h6 class="text-lightpurple font-weight-bold text-uppercase">
                                            {{$value->prod_name}}
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="font-weight-bold text-primary">{{$value->detail_quantity}}</td>
                        <td class="font-weight-bold text-success">
                            $&nbsp<span class="text-dark">{{$value->detail_price}}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-6 mt-5">
                <div class="form-group mt-3 d-flex">
                    <p class="m-0 text-only text-uppercase font-weight-bold col-4">TỔNG TIỀN: </p>
                    <p class="m-0 col-8 text-success font-weight-bold">$&nbsp<span class="text-dark">{{$value->order_total}}</span></p>
                </div>
                <div class="form-group mt-3 d-flex">
                    <p class="m-0 text-only text-uppercase font-weight-bold col-4">MÔ TẢ: </p>
                    <p class="m-0 col-8 font-weight-bold">{{$number->order_description}}</p>
                </div>
                <div class="form-group mt-3 d-flex">
                    <p class="m-0 text-only text-uppercase font-weight-bold col-4">ĐỊA CHỈ: </p>
                    <p class="m-0 col-8 font-weight-bold">{{$number->order_address}}</p>
                </div>
                <div class="form-group mt-3 d-flex align-items-center">
                    <p class="m-0 text-only text-uppercase font-weight-bold col-4">TRẠNG THÁI: </p>
                    @if ($value->order_status == 1)
                    <span class="badge badge-dark text-uppercase">{{$value->status_name}}</span>
                    @endif
                    @if ($value->order_status == 2)
                    <span class="badge badge-primary text-uppercase">{{$value->status_name}}</span>
                    @endif
                    @if ($value->order_status == 3)
                    <span class="badge badge-success text-uppercase">{{$value->status_name}}</span>
                    @endif
                    @if ($value->order_status == 4)
                    <span class="badge badge-danger text-uppercase">{{$value->status_name}}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
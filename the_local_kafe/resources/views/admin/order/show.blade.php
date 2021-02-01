@extends('admin.master')
@section('title', 'HIỂN THỊ ĐƠN HÀNG')
@section('content')
<div class="col-12">
    <div class="col-12 d-flex justify-content-between">
        <h1 class="font-weight-bold">ID: {{$order->order_id}}</h1>
        <div class="nut">
            <form action="{{ route('order.index') }}" method="get">
                <button type="submit" class="btn btn-danger text-uppercase mt-2 font-weight-bold">
                    <i class="fas fa-reply fa-lg"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="col-12 my-4 p-0 d-flex">
        <div class="col-3">
            @if ($order->image == null)
            <img id="avatar" class="img-thumbnail" src="backend/img/user.jpg" width="100%">
            @else
            <img id="avatar" class="img-thumbnail" src="{{ asset('/storage/'.$order->image) }}" width="100%">
            @endif
            <div class="d-flex justify-content-center my-2">
                <p class="font-weight-bold text-only">{{$order->name}}</p>
            </div>
        </div>

        <div class="col-9 mb-4">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-uppercase text-center" scope="col">SẢN PHẨM</th>
                        <th class="text-uppercase text-center" scope="col">SỐ LƯỢNG</th>
                        <th class="text-uppercase text-center" scope="col">GIÁ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $value)
                    <tr class="text-center">
                        <td>
                            <div class="product d-flex">
                                <div class="img Content_row_col-12_table_product_img" style="width: 30%">
                                    <img class="pic Content_row_col-12_table_product_img_pic"
                                        src="{{ asset('/storage/'.$value->prod_image) }}" style="width: 50px; height: auto;">
                                </div>
                                <div class="info Content_row_col-12_table_product_info" style="width: 70%">
                                    <h6 class="text-lightpurple font-weight-bold text-uppercase cursor">
                                        {{$value->prod_name}}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td class="font-weight-bold text-primary">x {{$value->detail_quantity}}</td>
                        <td class="font-weight-bold text-success">
                            $&nbsp<span class="text-dark">{{$value->detail_price}}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-8 mt-5">
                <div class="form-group mt-3 d-flex">
                    <p class="m-0 text-only text-uppercase font-weight-bold col-4">TỔNG TIỀN: </p>
                    <p class="m-0 col-8 text-success font-weight-bold">$&nbsp<span
                            class="text-dark">{{$value->order_total}}</span></p>
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

                    <form action="{{ route('order.edit', $value->order_id) }}" method="GET">
                        <button class="btn btn-warning mb-2 ml-3">
                            <i class="fas fa-marker"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
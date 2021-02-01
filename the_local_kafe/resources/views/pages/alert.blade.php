@extends('master')
@section('title', 'THÀNH CÔNG')
@section('content')
<div class="col-12 d-flex flex-column align-items-center mt-5">
    <div class="col-4 p-0">
        <div class="alert alert-success text-center" role="alert">
            <p class="m-0 text-uppercase">Đặt hàng thành công. Cảm ơn quý khách hàng đã tin dùng sản phẩm của chúng tôi !!!</p>
            <p class="m-0 text-uppercase">Nhấp vào "Quay lại trang chủ" để tiếp tục mua sắm ^^</p>
        </div>
    </div>

    <div class="col-4 my-3 text-center">
        <a class="btn-btn btn-lightpurple text-uppercase font-weight-bold text-decoration-none" href="{{ route('home') }}">
            Quay lại trang chủ
        </a>
    </div>
</div>
@endsection
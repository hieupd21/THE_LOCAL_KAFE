@extends('master')
@section('title', 'TÀI KHOẢN')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex flex-column align-items-center">
            <div class="col-8 text-center">
                <h1 class="my-3 text-only font-weight-bold">TÀI KHOẢN CỦA TÔI</h1>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center flex-wrap my-3">
                <div class="col-4">
                    <div class="form-group mt-3 d-flex">
                        <p class="m-0 text-only text-uppercase font-weight-bold col-4">TÊN: </p>
                        <p class="m-0 col-8">{{Auth::user()->name}}</p>
                    </div>
                    <div class="form-group mt-3 d-flex">
                        <p class="m-0 text-only text-uppercase font-weight-bold col-4">Email: </p>
                        <p class="m-0 col-8">{{Auth::user()->email}}</p>
                    </div>
                    <div class="form-group mt-3 d-flex">
                        <p class="m-0 text-only text-uppercase font-weight-bold col-4">SỐ ĐIỆN THOẠI: </p>
                        <p class="m-0 col-8">{{Auth::user()->phone}}</p>
                    </div>
                </div>
                <div class="col-4">
                    @if (Auth::user()->image == null)
                    <img id="avatar" class="img-thumbnail" src="backend/img/user.jpg" width="200px">
                    @else
                    <img id="avatar" class="img-thumbnail" src="{{ asset('/storage/'. Auth::user()->image) }}" width="200px">
                    @endif
                </div>
                <div class="col-8 text-center my-4">
                    <form action="{{ route('account.edit', Auth::user()->id) }}" method="GET">
                        <button class="btn btn-lightpurple text-uppercase font-weight-bold">
                            THAY ĐỔI
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
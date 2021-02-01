@extends('master')
@section('title', 'LIÊN HỆ')
@section('content')
<div class="container Banner">
    <div class="row justify-content-center">
        <div class="col-12 p-0">
            <div class="img d-flex justify-content-center align-items-center Banner_row_col-12_img"
                style="background-image: url('frontend/img/contact.png');">
                <h1 class="font-weight-bold text-only font-lg pointer animate__animated animate__fadeInDown">
                    LIÊN HỆ
                </h1>
            </div>
        </div>
    </div>
</div>

<div class="container Content">
    <div class="row mb-4">
        <div class="col-12 my-4 text-right animate__animated animate__fadeInRight">
            <h3 class="m-0 font-weight-bold text-uppercase">
                <a class="text-decoration-none text-lightpurple" href="{{ route('home') }}">coffee</a>
                TRỤ SỞ CHÍNH
            </h3>
            <p class="m-0 font-weight-bold text-uppercase font-small">
                1 Trần Cao Vân, Đà Nẵng
            </p>
            <p class="m-0 font-weight-bold text-uppercase font-small">
                (070) 392-8702
            </p>
        </div>
        <div class="col-12 my-3 text-center d-flex">
            <div class="content w-50">
                @if (session('success'))
                <div class="alert alert-success mr-5 animate__animated animate__fadeInDown" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <h4
                    class="font-weight-bold text-only text-uppercase text-left mb-3 animate__animated animate__fadeInLeft">
                    Vui lòng gửi cho chúng tôi một dòng
                </h4>

                @if (Route::has('getLogin'))
                @auth
                <form action="{{ route('contact.add') }}" class="mr-5" method="POST">
                    @csrf
                    <div class="form-group text-left animate__animated animate__fadeInRight">
                        <label class="text-only font-weight-bold text-uppercase">Tên</label>
                        <input type="text" name="name" class="form-control rounded-0 border-none" value="{{Auth::user()->name}}" required>
                    </div>
                    <div class="form-group text-left animate__animated animate__fadeInLeft">
                        <label class="text-only font-weight-bold text-uppercase">Email</label>
                        <input type="email" name="email" class="form-control rounded-0 border-none" value="{{Auth::user()->email}}" required>
                    </div>
                    <div class=" form-group text-left animate__animated animate__fadeInRight">
                        <label class="text-only font-weight-bold text-uppercase">Chúng tôi có thể giúp gì?</label>
                        <textarea class="form-control rounded-0 border-none" name="description" id="text"
                            rows="3" required></textarea>
                    </div>
                    <button
                        class="btn btn-lightpurple rounded-0 font-weight-bold text-uppercase px-3 animate__animated animate__fadeInUp">
                        XÁC NHẬN
                    </button>
                </form>
                @else
                <form action="{{ route('contact.add') }}" class="mr-5" method="POST">
                    @csrf
                    <div class="form-group text-left animate__animated animate__fadeInRight">
                        <label class="text-only font-weight-bold text-uppercase">Tên</label>
                        <input type="text" name="name" class="form-control rounded-0 border-none" required>
                    </div>
                    <div class="form-group text-left animate__animated animate__fadeInLeft">
                        <label class="text-only font-weight-bold text-uppercase">Email</label>
                        <input type="email" name="email" class="form-control rounded-0 border-none" required>
                    </div>
                    <div class="form-group text-left animate__animated animate__fadeInRight">
                        <label class="text-only font-weight-bold text-uppercase">Chúng tôi có thể giúp gì?</label>
                        <textarea class="form-control rounded-0 border-none" name="description" id="text"
                            rows="3" required></textarea>
                    </div>
                    <button
                        class="btn btn-lightpurple rounded-0 font-weight-bold text-uppercase px-3 animate__animated animate__fadeInUp">
                        XÁC NHẬN
                    </button>
                </form>
                @endauth
                @endif
            </div>
            <div class="img w-50 Content_row_col-12_img animate__animated animate__fadeInUp"
                style="background-image: url('frontend/img/batender.png');"></div>
        </div>
    </div>
</div>
@endsection
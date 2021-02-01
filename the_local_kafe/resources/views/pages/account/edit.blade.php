@extends('master')
<<<<<<< HEAD
@section('title', 'SỬA TÀI KHOẢN')
=======
@section('title', 'EDIT ACCOUNT')
>>>>>>> a38510893934e30461fc5fa33add74ad3c12fcf3
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex flex-column align-items-center">
            <div class="col-8 text-center">
<<<<<<< HEAD
                <h1 class="my-3 text-only font-weight-bold">TÀI KHOẢN CỦA TÔI</h1>
=======
                <h1 class="my-3 text-only font-weight-bold">MY ACCOUNT</h1>
>>>>>>> a38510893934e30461fc5fa33add74ad3c12fcf3
            </div>
            <div class="col-12">
                @include('error.note')
                <form action="{{ route('account.update', $user->id) }}" method="post"
                    class="d-flex justify-content-center align-items-center flex-wrap my-3"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-4">
                        <div class="form-group mt-3 d-flex align-items-center">
<<<<<<< HEAD
                            <p class="m-0 text-only text-uppercase font-weight-bold col-4">TÊN: </p>
=======
                            <p class="m-0 text-only text-uppercase font-weight-bold col-4">Name: </p>
>>>>>>> a38510893934e30461fc5fa33add74ad3c12fcf3
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                        </div>
                        <div class="form-group mt-3 d-flex align-items-center">
                            <p class="m-0 text-only text-uppercase font-weight-bold col-4">Email: </p>
                            <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
                        </div>
                        <div class="form-group mt-3 d-flex align-items-center">
<<<<<<< HEAD
                            <p class="m-0 text-only text-uppercase font-weight-bold col-4">SỐ ĐIỆN THOẠI: </p>
=======
                            <p class="m-0 text-only text-uppercase font-weight-bold col-4">Phone: </p>
>>>>>>> a38510893934e30461fc5fa33add74ad3c12fcf3
                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                        </div>
                    </div>
                    <div class="form-group">
                        @if ($user->image == null)
                        <img id="avatar" class="img-thumbnail" src="backend/img/user.jpg" width="200px">
                        @else
                        <img id="avatar" class="img-thumbnail" src="{{ asset('/storage/'.$user->image) }}"
                            width="200px">
                        @endif
                        <input type="file" class="form-control-file hidden mt-2" name="image" onchange="changeImg(this)" required>
                    </div>
                    <div class="col-8 text-center my-4 d-flex justify-content-center">
                        <button class="btn btn-lightpurple text-uppercase font-weight-bold">
<<<<<<< HEAD
                            THAY ĐỔI
=======
                            Change
>>>>>>> a38510893934e30461fc5fa33add74ad3c12fcf3
                        </button>
                    </div>
                    <div class="col-8 text-center">
                        <form action="{{ route('account.index') }}" method="GET">
                            <button class="btn btn-danger text-uppercase font-weight-bold">
<<<<<<< HEAD
                                QUAY LẠI
=======
                                Back
>>>>>>> a38510893934e30461fc5fa33add74ad3c12fcf3
                            </button>
                        </form>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
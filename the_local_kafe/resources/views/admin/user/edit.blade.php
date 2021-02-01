@extends('admin.master')
@section('title', 'SỬA NGƯỜI DÙNG')
@section('content')
<div class="col-12 d-flex">
    <div class="col-1 mr-5">
        <form action="{{ route('user.index') }}" method="get">
            <button type="submit" class="btn btn-danger text-uppercase mt-2 font-weight-bold">
                <i class="fas fa-reply fa-lg"></i>
            </button>
        </form>
    </div>
    <div class="col-6 mb-3 text-center">
        @include('error.note')
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @if ($user->image == null)
                <img id="avatar" class="img-thumbnail" src="backend/img/user.jpg" width="200px">
                @else
                <img id="avatar" class="img-thumbnail" src="{{ asset('/storage/'.$user->image) }}" width="200px">
                @endif
                <input type="file" class="form-control-file hidden" name="image" onchange="changeImg(this)">
            </div>
            <div class="form-group d-flex align-items-center mb-3">
                <div class="col-3 text-right">
                    <label class="text-uppercase font-weight-bold m-0">TÊN</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group d-flex align-items-center mb-3">
                <div class="col-3 text-right">
                    <label class="text-uppercase font-weight-bold m-0">email</label>
                </div>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>
            </div>
            <div class="form-group d-flex align-items-center mb-3">
                <div class="col-3 text-right">
                    <label class="text-uppercase font-weight-bold m-0">SỐ ĐIỆN THOẠI</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                </div>
            </div>
            <div class="form-group d-flex align-items-center mb-3">
                <div class="col-3 text-right">
                    <label class="text-uppercase font-weight-bold m-0">VAI TRÒ</label>
                </div>
                <div class="col-8">
                    <select class="form-control font-weight-bold" name="role" required>
                        @foreach ($role as $value)
                        <option value="{{$value->role_id}}" @if ($user->role==$value->role_id) selected @endif>
                            {{$value->role_name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary text-uppercase font-weight-bold px-3">
                XÁC NHẬN
            </button>
        </form>
    </div>
</div>
@endsection
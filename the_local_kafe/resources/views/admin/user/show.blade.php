@extends('admin.master')
@section('title', 'HIỂN THỊ NGƯỜI DÙNG')
@section('content')
<div class="col-12">
    <div class="col-12 d-flex justify-content-between">
        <h1 class="font-weight-bold">ID: {{$user->id}}</h1>
        <div class="nut">
            <form action="{{ route('user.index') }}" method="get">
                <button type="submit" class="btn btn-primary text-uppercase mt-2 font-weight-bold">
                    <i class="fas fa-reply fa-lg"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="col-12 my-4 d-flex p-0">
        <div class="col-3 text-center">
            @if ($user->image == null)
            <img id="avatar" class="img-thumbnail" src="backend/img/user.jpg" width="200px">
            @else
            <img id="avatar" class="img-thumbnail" src="{{ asset('/storage/'.$user->image) }}" width="200px">
            @endif
            <div class="d-flex justify-content-center my-3">
                <form action="{{route('user.edit', $user->id)}}" method="GET">
                    <button class="btn btn-warning mr-3">
                        <i class="fas fa-marker"></i>
                    </button>
                </form>

                <form action="{{route('user.delete', $user->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="col-9">
            <div class="form-group d-flex align-items-center mb-3">
                <div class="col-3 text-right">
                    <label class="text-uppercase font-weight-bold m-0">TÊN</label>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control" name="title" value="{{$user->name}}" disabled>
                </div>
            </div>
            <div class="form-group d-flex align-items-center mb-3">
                <div class="col-3 text-right">
                    <label class="text-uppercase font-weight-bold m-0">email</label>
                </div>
                <div class="col-7">
                    <input type="email" class="form-control" name="title" value="{{$user->email}}" disabled>
                </div>
            </div>
            <div class="form-group d-flex align-items-center mb-3">
                <div class="col-3 text-right">
                    <label class="text-uppercase font-weight-bold m-0">SỐ ĐIỆN THOẠI</label>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control" name="title" value="{{$user->phone}}" disabled>
                </div>
            </div>
            <div class="form-group d-flex align-items-center mb-3">
                <div class="col-3 text-right">
                    <label class="text-uppercase font-weight-bold m-0">VAI TRÒ</label>
                </div>
                <div class="col-7">
                    <input type="text" class="form-control" name="title" value="{{$user->role_name}}" disabled>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
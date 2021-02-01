@extends('admin.master')
@section('title', 'SỬA THỂ LOẠI')
@section('content')
<div class="col-12 d-flex mb-3 justify-content-center">
    <div class="col-5">
        <ul class="list-group">
            <li class="list-group-item bg-whitesmoke">
                <h5 class="m-0 font-weight-bold text-center text-uppercase">
                    SỬA THỂ LOẠI
                </h5>
            </li>
            <li class="list-group-item">
                @include('error.note')
                <form action="{{ route('articlecate.update', $category->cate_id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thể loại:</label>
                        <input type="text" class="form-control" name="name" value="{{$category->cate_name}}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block text-uppercase font-weight-bold">
                        cập nhật
                    </button>
                </form>
                <form action="{{ route('articlecate.index' )}}" method="get">
                    <button type="submit" class="btn btn-danger btn-block text-uppercase mt-2 font-weight-bold">
                        hủy bỏ
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
@endsection
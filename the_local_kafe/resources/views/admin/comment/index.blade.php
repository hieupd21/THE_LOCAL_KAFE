@extends('admin.master')
@section('title','BÌNH LUẬN')
@section('content')
<div class="col-12">
    <div class="col-12 p-0">
        <ul class="list-group">
            <li class="list-group-item bg-whitesmoke">
                <h5 class="m-0 font-weight-bold text-center text-uppercase">
                    DANH SÁCH BÌNH LUẬN
                </h5>
            </li>
            <li class="list-group-item">
                <div class="col-4 p-0">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('delete') }}
                        </div>
                    @endif
                    @if (session('update'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('update') }}
                        </div>
                    @endif
                </div>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-uppercase text-center" scope="col">#</th>
                            <th class="text-uppercase text-center" scope="col">người dùng</th>
                            <th class="text-uppercase text-center" scope="col">sản phẩm</th>
                            <th class="text-uppercase text-center" scope="col">bình luận</th>
                            <th class="text-uppercase text-center" scope="col">hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cmts as $item)
                        <tr>
                            <th class="text-center">{{$item->cmt_id}}</th>
                            <td class="text-center" style="width: 150px;">{{$item->name}}</td>
                            <td class="text-center">
                                <img src="{{ asset('/storage/'.$item->prod_image) }}" width="110px"></td>
                            <td class="text-center" style="width: 450px">{{$item->cmt_content}}</td>
                            <td class="text-center d-flex flex-column justify-content-around">
                                <form action="{{ route('comment.delete', $item->cmt_id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
                <div class="col-12 d-flex justify-content-center">
                    {{$cmts->render()}}
                </div>
            </li>
        </ul>
    </div>
</div> 
@endsection
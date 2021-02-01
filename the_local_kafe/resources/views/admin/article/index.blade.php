@extends('admin.master')
@section('title', 'BÀI VIẾT')
@section('content')
<div class="col-12">
    <div class="col-12 p-0">
        <ul class="list-group">
            <li class="list-group-item bg-whitesmoke">
                <h5 class="m-0 font-weight-bold text-center text-uppercase">
                    DANH SÁCH BÀI VIẾT
                </h5>
            </li>
            <li class="list-group-item">
                <form action="{{ route('article.create') }}" method="get">
                    <button class="btn btn-primary mb-2 font-weight-bold text-uppercase px-3">
                        tạo
                    </button>
                </form>
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
                            <th class="text-uppercase text-center" scope="col">tiêu đề</th>
                            <th class="text-uppercase text-center" scope="col">mô tả</th>
                            <th class="text-uppercase text-center" scope="col">thể loại</th>
                            <th class="text-uppercase text-center" scope="col">hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $value)
                        <tr>
                            <th class="text-center" style="width: 55px;">{{$value->art_id}}</th>
                            <td class="text-center" style="width: 280px;">{{$value->art_title}}</td>
                            <td class="text-center" style="width: 280px;">
                                <img src="{{ asset('/storage/'.$value->art_image) }}" width="100%">
                            </td>
                            <td class="text-center" style="width: 170px;">{{$value->cate_name}}</td>
                            <td class="text-center d-flex flex-column justify-content-around">
                                <form action="{{ route('article.show', $value->art_id) }}" method="GET">
                                    <button class="btn btn-primary mb-2">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </form>

                                <form action="{{ route('article.edit', $value->art_id) }}" method="GET">
                                    <button class="btn btn-warning mb-2">
                                        <i class="fas fa-marker"></i>
                                    </button>
                                </form>

                                <form action="{{ route('article.delete', $value->art_id) }}" method="POST">
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
                    {{$articles->render()}}
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection
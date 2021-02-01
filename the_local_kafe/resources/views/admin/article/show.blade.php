@extends('admin.master')
@section('title', 'SHOW ARTICLE')
@section('content')
<div class="col-12">
    <div class="col-12 d-flex justify-content-between">
        <h1 class="font-weight-bold">ID: {{$art_cate->art_id}}</h1>
        <div class="nut">
            <form action="{{ route('article.index') }}" method="get">
                <button type="submit" class="btn btn-primary text-uppercase mt-2 font-weight-bold">
                    <i class="fas fa-reply fa-lg"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="col-12 my-4 d-flex p-0">
        <div class="col-3 text-center">
            <ul class="list-group">
                <li class="list-group-item bg-whitesmoke">
                    <h5 class="text-uppercase font-weight-bold text-dark m-0">
                        {{$art_cate->cate_name}}
                    </h5>
                </li>
            </ul>
            <h5 class="font-weight-bold text-primary"></h5>
            <img src="{{ asset('/storage/'.$art_cate->art_image) }}" width="100%">
            <div class="d-flex justify-content-center my-3">
                <form action="{{route('article.edit', $art_cate->art_id)}}" method="GET">
                    <button class="btn btn-warning mr-3">
                        <i class="fas fa-marker"></i>
                    </button>
                </form>

                {{-- delete --}}
                <form action="{{route('article.delete', $art_cate->art_id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="col-9">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-uppercase text-center" scope="col">Title</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">
                            {{$art_cate->art_title}}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-uppercase text-center" scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">
                            {{$art_cate->art_description}}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-uppercase text-center" scope="col">Content</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">
                            {!! $art_cate->art_content !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
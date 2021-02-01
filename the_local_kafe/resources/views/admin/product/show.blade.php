@extends('admin.master')
@section('title', 'HIỂN THỊ SẢN PHẨM')
@section('content')
<div class="col-12">
    <div class="col-12 d-flex justify-content-between">
        <h1 class="font-weight-bold">ID: {{$prod_cate->prod_id}}</h1>
        <div class="nut">
            <form action="{{ route('product.index') }}" method="get">
                <button type="submit" class="btn btn-primary text-uppercase mt-2 font-weight-bold">
                    <i class="fas fa-reply fa-lg"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="col-12 my-4 d-flex p-0">
        <div class="col-3 text-center mb-4">
            <ul class="list-group">
                <li class="list-group-item bg-whitesmoke">
                    <h5 class="text-uppercase font-weight-bold text-dark m-0">
                        {{$prod_cate->cate_name}}
                    </h5>
                </li>
            </ul>
            <h5 class="font-weight-bold text-primary"></h5>
            <img src="{{ asset('/storage/'.$prod_cate->prod_image) }}" width="100%">
            <h5 class="font-weight-bold">{{$prod_cate->prod_name}}</h5>
            <h5 class="font-weight-bold text-success">
                <span>$&nbsp{{number_format($prod_cate->prod_price,2)}}</span>
            </h5>
            <span class="badge badge-danger">{{$prod_cate->prod_discount}}%</span>
            <span class="badge badge-primary text-uppercase">
                @if ($prod_cate->prod_featured=='yes')
                tiểu biểu
                @else
                thông thường
                @endif
            </span>
        </div>

        <div class="col-9">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-uppercase text-center">thông thường</th>
                        <th class="text-uppercase text-center" style="width: 150px;">hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">
                            {!! $prod_cate->prod_description !!}
                        </td>
                        <td class="text-center d-flex flex-column justify-content-around">
                            {{-- edit --}}
                            <form action="{{route('product.edit', $prod_cate->prod_id)}}" method="GET">
                                <button class="btn btn-warning mb-2">
                                    <i class="fas fa-marker"></i>
                                </button>
                            </form>

                            {{-- delete --}}
                            <form action="{{route('product.delete', $prod_cate->prod_id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
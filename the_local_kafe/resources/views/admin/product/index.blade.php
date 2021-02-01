@extends('admin.master')
@section('title', 'SẢN PHẨM')
@section('content')
<div class="col-12">
    <div class="col-12 p-0">
        <ul class="list-group">
            <li class="list-group-item bg-whitesmoke">
                <h5 class="m-0 font-weight-bold text-center text-uppercase">
                    DANH SÁCH SẢN PHẨM
                </h5>
            </li>
            <li class="list-group-item">
                <form action="{{ route('product.create') }}" method="get">
                    <button class="btn btn-primary mb-2 font-weight-bold text-uppercase px-3">
                        TẠO
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
                            <th class="text-uppercase text-center" scope="col">tên</th>
                            <th class="text-uppercase text-center" scope="col">giá</th>
                            <th class="text-uppercase text-center" scope="col">hình ảnh</th>
                            <th class="text-uppercase text-center" scope="col">số lượng</th>
                            <th class="text-uppercase text-center" scope="col">hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $value)
                        @if ($value->prod_quantity <= 10)
                        <tr style="background: antiquewhite;">
                            <th class="text-center" style="width: 55px;">{{$value->prod_id}}</th>
                            <td class="text-center" style="width: 300px;">{{$value->prod_name}}</td>
                            <td class="text-center" style="width: 85px;">
                                <span class="text-success font-weight-bold">$&nbsp</span>{{number_format($value->prod_price,2)}}
                            </td>
                            <td class="text-center" style="width: 230px;">
                                <img src="{{ asset('/storage/'.$value->prod_image) }}" width="110px">
                            </td>
                            <td class="text-center text-danger font-weight-bold">{{$value->prod_quantity}}</td>
                            <td class="text-center d-flex flex-column justify-content-around">

                                <form action="{{ route('product.show', $value->prod_id) }}" method="GET">
                                    <button class="btn btn-primary mb-2">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </form>

                                <form action="{{ route('product.edit', $value->prod_id) }}" method="GET">
                                    <button class="btn btn-warning mb-2">
                                        <i class="fas fa-marker"></i>
                                    </button>
                                </form>

                                <form action="{{ route('product.delete', $value->prod_id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr> 
                        @else
                        <tr>
                            <th class="text-center" style="width: 55px;">{{$value->prod_id}}</th>
                            <td class="text-center" style="width: 300px;">{{$value->prod_name}}</td>
                            <td class="text-center" style="width: 85px;">
                                <span class="text-success font-weight-bold">$&nbsp</span>{{number_format($value->prod_price,2)}}
                            </td>
                            <td class="text-center" style="width: 230px;">
                                <img src="{{ asset('/storage/'.$value->prod_image) }}" width="110px">
                            </td>
                            <td class="text-center">{{$value->prod_quantity}}</td>
                            <td class="text-center d-flex flex-column justify-content-around">

                                <form action="{{ route('product.show', $value->prod_id) }}" method="GET">
                                    <button class="btn btn-primary mb-2">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </form>

                                <form action="{{ route('product.edit', $value->prod_id) }}" method="GET">
                                    <button class="btn btn-warning mb-2">
                                        <i class="fas fa-marker"></i>
                                    </button>
                                </form>

                                <form action="{{ route('product.delete', $value->prod_id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="col-12 d-flex justify-content-center">
                    {{$products->render()}}
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection
@extends('admin.master')
@section('title', 'ĐƠN HÀNG')
@section('content')
<div class="col-12">
    <div class="col-12 p-0">
        <ul class="list-group">
            <li class="list-group-item bg-whitesmoke">
                <h5 class="m-0 font-weight-bold text-center text-uppercase">
                    DANH SÁCH ĐƠN HÀNG
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
                <table class="table table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-uppercase text-center" scope="col">#</th>
                            <th class="text-uppercase text-center" scope="col">khách hàng</th>
                            <th class="text-uppercase text-center" scope="col">tổng giá</th>
                            <th class="text-uppercase text-center" scope="col">trạng thái</th>
                            <th class="text-uppercase text-center" scope="col">hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $value)
                        <tr>
                            <th>{{$value->order_id}}</th>
                            <td>{{$value->name}}</td>
                            <td>
                                <span class="text-success font-weight-bold">$&nbsp</span>{{$value->order_total}}
                            </td>
                            <td>
                                @if ($value->order_status == 1)
                                    <span class="badge badge-dark text-uppercase">{{$value->status_name}}</span>
                                @endif
                                @if ($value->order_status == 2)
                                    <span class="badge badge-primary text-uppercase">{{$value->status_name}}</span>
                                @endif
                                @if ($value->order_status == 3)
                                    <span class="badge badge-success text-uppercase">{{$value->status_name}}</span>
                                @endif
                                @if ($value->order_status == 4)
                                    <span class="badge badge-danger text-uppercase">{{$value->status_name}}</span>
                                @endif
                            </td>
                            <td class="d-flex justify-content-center">
                                <form action="{{ route('order.show', $value->order_id) }}" method="GET">
                                    <button class="btn btn-primary mb-2 mr-2">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </form>

                                <form action="{{ route('order.edit', $value->order_id) }}" method="GET">
                                    <button class="btn btn-warning mb-2">
                                        <i class="fas fa-marker"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
</div>
@endsection
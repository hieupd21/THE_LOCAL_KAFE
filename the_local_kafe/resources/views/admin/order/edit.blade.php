@extends('admin.master')
@section('title', 'SỬA TRẠNG THÁI')
@section('content')
<div class="col-12 d-flex mb-3 justify-content-center">
    <div class="col-5">
        <ul class="list-group">
            <li class="list-group-item bg-whitesmoke">
                <h5 class="m-0 font-weight-bold text-center text-uppercase">
                    SỬA TRẠNG THÁI
                </h5>
            </li>
            <li class="list-group-item">
                @include('error.note')
                <form action="{{ route('order.update', $order->order_id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trạng thái:</label>
                        <select class="form-control font-weight-bold" name="status" required>
                            @foreach ($status as $value)
                            <option value="{{$value->status_id}}" @if ($order->order_status == $value->status_id) selected @endif>
                                {{$value->status_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block text-uppercase font-weight-bold">
                        cập nhật
                    </button>
                </form>
                <form action="{{ route('order.index' )}}" method="get">
                    <button type="submit" class="btn btn-danger btn-block text-uppercase mt-2 font-weight-bold">
                        hủy bỏ
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
@endsection
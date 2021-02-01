@extends('admin.master')
@section('title', 'NGƯỜI DÙNG')
@section('content')
<div class="col-12">
    <div class="col-12 p-0">
        <ul class="list-group">
            <li class="list-group-item bg-whitesmoke">
                <h5 class="m-0 font-weight-bold text-center text-uppercase">
                    DANH SÁCH NGƯỜI DÙNG
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
                            <th class="text-uppercase text-center" scope="col">TÊN</th>
                            <th class="text-uppercase text-center" scope="col">email</th>
                            <th class="text-uppercase text-center" scope="col">VAI TRÒ</th>
                            <th class="text-uppercase text-center" scope="col">HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $value)
                        <tr>
                            <th class="text-center" style="width: 55px;">{{$value->id}}</th>
                            <td class="text-center" style="width: 200px;">{{$value->name}}</td>
                            <td class="text-center" style="width: 330px;">{{$value->email}}</td>
                            <td class="text-center" style="width: 140px;">
                                @if ($value->role == 1)
                                <span class="badge badge-pill px-3 badge-danger text-uppercase">
                                    {{$value->role_name}}
                                </span>
                                @else
                                    @if ($value->role == 2)
                                    <span class="badge badge-pill px-3 badge-success text-uppercase">
                                        {{$value->role_name}}
                                    </span>
                                    @else
                                    <span class="badge badge-pill px-3 badge-secondary text-uppercase">
                                        {{$value->role_name}}
                                    </span>
                                    @endif
                                @endif
                            </td>
                            <td class="text-center d-flex flex-column justify-content-around">
                                <form action="{{ route('user.show', $value->id) }}" method="GET">
                                    <button class="btn btn-primary mb-2">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </form>

                                <form action="{{ route('user.delete', $value->id) }}" method="POST">
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
                    {{$users->render()}}
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection
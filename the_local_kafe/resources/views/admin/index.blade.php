@extends('admin.master')
@section('title', 'TRANG CHỦ')
@section('content')
<div class="col-12 d-flex mb-3 flex-wrap">
    <div class="col-3 mb-3">
        <div class="items d-flex align-items-center border">
            <div class="icon p-4 bg-danger">
                <i class="fas fa-certificate fa-3x"></i>
            </div>
            <div class="info ml-2">
                <div class="number">
                    <h2 class="m-0 font-weight-bold">{{ $category }}</h2>
                </div>
                <div class="text">
                    <p class="m-0">Thể loại</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3 mb-3">
        <div class="items d-flex align-items-center border">
            <div class="icon p-4 bg-warning">
                <i class="fas fa-newspaper fa-3x"></i>
            </div>
            <div class="info ml-2">
                <div class="number">
                    <h2 class="m-0 font-weight-bold">{{ $article }}</h2>
                </div>
                <div class="text">
                    <p class="m-0">Bài viết</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3 mb-3">
        <div class="items d-flex align-items-center border">
            <div class="icon p-4 bg-success">
                <i class="fas fa-users fa-3x"></i>
            </div>
            <div class="info ml-2">
                <div class="number">
                    <h2 class="m-0 font-weight-bold">{{ $user }}</h2>
                </div>
                <div class="text">
                    <p class="m-0">Người dùng</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3 mb-3">
        <div class="items d-flex align-items-center border">
            <div class="icon p-4 bg-primary">
                <i class="fas fa-box fa-3x"></i>
            </div>
            <div class="info ml-2">
                <div class="number">
                    <h2 class="m-0 font-weight-bold">{{ $product }}</h2>
                </div>
                <div class="text">
                    <p class="m-0">Sản phẩm</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3 mb-3">
        <div class="items d-flex align-items-center border">
            <div class="icon p-4 bg-pink">
                <i class="fas fa-comments fa-3x"></i>
            </div>
            <div class="info ml-2">
                <div class="number">
                    <h2 class="m-0 font-weight-bold">{{ $comment }}</h2>
                </div>
                <div class="text">
                    <p class="m-0">Bình luận</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3 mb-3">
        <div class="items d-flex align-items-center border">
            <div class="icon p-4 bg-dark">
                <i class="fas fa-receipt fa-3x px-2 text-light"></i>
            </div>
            <div class="info ml-2">
                <div class="number">
                    <h2 class="m-0 font-weight-bold">{{ $order }}</h2>
                </div>
                <div class="text">
                    <p class="m-0">Đơn hàng</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3 mb-3">
        <div class="items d-flex align-items-center border">
            <div class="icon p-4 bg-violet">
                <i class="fas fa-address-card fa-3x text-light"></i>
            </div>
            <div class="info ml-2">
                <div class="number">
                    <h2 class="m-0 font-weight-bold">{{ $contact }}</h2>
                </div>
                <div class="text">
                    <p class="m-0">Liên hệ</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="jumbotron bg-best">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
</div>
@endsection
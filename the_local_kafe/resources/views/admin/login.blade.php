<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href="{{asset('')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="frontend/css/animate/animate.min.css">
    <title>ĐĂNG NHẬP</title>

</head>

<body class="bg-whitesmoke">

    <div class="container">
        <div class="row vh-100">
            <div class="col-md-4 col-6 bg-dark m-auto py-5 animate__animated animate__fadeInDown">
                <h1 class="text-center text-only font-weight-bold mb-3">ĐĂNG NHẬP</h1>
                @include('error.note')
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('postLogin') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="text-uppercase text-only font-weight-bold">
                            Email
                        </label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-only font-weight-bold">
                            Mật khẩu
                        </label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" name="remember">
                        <label class="form-check-label text-white">
                            Ghi nhớ
                        </label>
                    </div>
                    <button type="submit" class="btn btn-lightpurple btn-block font-weight-bold text-uppercase">
                        Đăng nhập
                    </button>
                </form>
                <a class="btn btn-block btn-facebook mt-3 font-weight-bold text-uppercase" href="{{ route('redirect', ['facebook']) }}">
                    <i class="fab fa-facebook-f mr-2"></i>
                    Tiếp tục với Facebook
                </a>
                <a class="btn btn-block btn-danger mt-3 font-weight-bold text-uppercase" href="{{ route('redirect', ['google']) }}">
                    <i class="fab fa-google mr-2"></i>
                    Tiếp tục với Google
                </a>
                <p class="m-0 my-3 text-white">Bạn chưa có tài khoản?
                    <a class="text-uppercase text-only text-decoration-none font-weight-bold"
                        href="{{ route('getRegister') }}">
                        Đăng kí
                    </a>
                </p>
                <p class="m-0 mt-2 text-center">
                    <a class="text-uppercase text-only text-decoration-none font-weight-bold"
                        href="{{ route('home') }}">
                        Quay lại
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>
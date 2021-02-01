<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href="{{asset('')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@400;700&display=swap">
    <link rel="stylesheet" href="frontend/css/animate/animate.min.css">
    <title>ĐĂNG KÍ</title>

</head>

<body class="bg-whitesmoke">

    <div class="container">
        <div class="row vh-100">
            <div class="col-md-4 col-6 bg-dark m-auto py-5 animate__animated animate__fadeInUp">
                <h1 class="text-center text-only font-weight-bold mb-3">ĐĂNG KÍ</h1>
                @include('error.note')
                <form action="{{ route('postRegister') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="text-uppercase text-only font-weight-bold">
                            tên
                        </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-only font-weight-bold">
                            Email
                        </label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase text-only font-weight-bold">
                            mật khẩu
                        </label>
                        <input type="password" class="form-control" name="password">
                    </div> 
                    <div class="form-group">
                        <label class="text-uppercase text-only font-weight-bold">
                            số điện thoại
                        </label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group d-none">
                        <label class="text-uppercase text-only font-weight-bold">
                            vai trò
                        </label>
                        <input type="text" class="form-control" name="role" value="3">
                    </div>
                    <button type="submit" class="btn btn-lightpurple btn-block font-weight-bold text-uppercase mt-4">
                        xác nhận
                    </button>
                </form>
                <p class="m-0 mt-3 text-center">
                    <a class="text-uppercase text-lightpurple text-decoration-none font-weight-bold"
                        href="{{ route('getLogin') }}">
                        Quay lại
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>

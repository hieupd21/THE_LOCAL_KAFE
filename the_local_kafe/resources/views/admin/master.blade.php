<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="{{asset('')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="backend/css/style.css">
    <link rel="shortcut icon" href="backend/img/admin-favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <title>@yield('title') | QUẢN TRỊ</title>
    <script src="/editor/ckeditor/ckeditor.js"></script>
</head>

<body>

    <div class="container-fluid Main">
        <div class="row vh-100">
            <div class="col-3">
                <!-- Logo -->
                <div class="col-12 Logo mt-2 mb-3">
                    <a class=" d-flex justify-content-center align-items-center py-3 text-lightpurple text-decoration-none"
                        href="{{ route('dashboard')}}">
                        <i class="fas fa-code fa-3x mr-2"></i>
                        <h2 class="m-0 font-weight-bold">ADMIN</h2>
                    </a>
                </div>

                <!-- Category Navbar -->
                <div class="col-12 CateNav p-0">
                    <ul class="m-0 p-0" id="side-menu">
                        <li class="list-unstyled py-1">
                            <a class="text-decoration-none text-dark font-weight-bold d-flex align-items-center py-2 px-3 Main_row_col-3_CateNav_a"
                                href="{{ route('product.index') }}">
                                <i class="fas fa-box mr-2 Main_row_col-3_CateNav_a_i text-center text-primary"></i>
                                <p class="m-0 Main_row_col-3_CateNav_a_p">SẢN PHẨM</p>
                            </a>
                        </li>
                        <li class="list-unstyled py-1">
                            <a class="text-decoration-none text-dark font-weight-bold d-flex align-items-center py-2 px-3 Main_row_col-3_CateNav_a"
                                href="{{ route('article.index') }}">
                                <i
                                    class="fas fa-newspaper mr-2 Main_row_col-3_CateNav_a_i text-center text-warning"></i>
                                <p class="m-0 Main_row_col-3_CateNav_a_p">BÀI VIẾT</p>
                            </a>
                        </li>
                        <li class="list-unstyled py-1">
                            <a class="text-decoration-none text-dark font-weight-bold d-flex align-items-center py-2 px-3 Main_row_col-3_CateNav_a"
                                href="{{ route('order.index') }}">
                                <i
                                    class="fas fa-receipt mr-2 Main_row_col-3_CateNav_a_i text-center text-dark"></i>
                                <p class="m-0 Main_row_col-3_CateNav_a_p">ĐƠN HÀNG</p>
                            </a>
                        </li>
                        @auth
                        @if (Auth::user()->role == 1)
                        <li class="list-unstyled py-1">
                            <a class="text-decoration-none text-dark font-weight-bold d-flex align-items-center py-2 px-3 Main_row_col-3_CateNav_a"
                                href="{{ route('user.index') }}">
                                <i class="fas fa-users mr-2 Main_row_col-3_CateNav_a_i text-center text-success"></i>
                                <p class="m-0 Main_row_col-3_CateNav_a_p">NGƯỜI DÙNG</p>
                            </a>
                        </li>
                        <li class="list-unstyled py-1">
                            <a class="text-decoration-none text-dark font-weight-bold d-flex align-items-center py-2 px-3 Main_row_col-3_CateNav_a"
                                data-toggle="collapse" href="#collapseExample" role="button">
                                <i
                                    class="fas fa-certificate mr-2 Main_row_col-3_CateNav_a_i text-center text-danger"></i>
                                <p class="m-0 Main_row_col-3_CateNav_a_p">THỂ LOẠI</p>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <a class="ml-5 text-decoration-none text-dark font-weight-bold d-flex align-items-center py-2 px-3 Main_row_col-3_CateNav_a"
                                    href="{{ route('productcate.index') }}" role="button">
                                    <i class="fas fa-box mr-2 Main_row_col-3_CateNav_a_i text-center text-primary"></i>
                                    <p class="m-0 Main_row_col-3_CateNav_a_p">SẢN PHẨM</p>
                                </a>
                                <a class="ml-5 text-decoration-none text-dark font-weight-bold d-flex align-items-center py-2 px-3 Main_row_col-3_CateNav_a"
                                    href="{{ route('articlecate.index') }}" role="button">
                                    <i
                                        class="fas fa-newspaper mr-2 Main_row_col-3_CateNav_a_i text-center text-warning"></i>
                                    <p class="m-0 Main_row_col-3_CateNav_a_p">BÀI VIẾT</p>
                                </a>
                            </div>
                        </li>
                        <li class="list-unstyled py-1">
                            <a class="text-decoration-none text-dark font-weight-bold d-flex align-items-center py-2 px-3 Main_row_col-3_CateNav_a"
                                href="{{ route('comment.index') }}">
                                <i class="fas fa-comments mr-2 Main_row_col-3_CateNav_a_i text-center text-pink"></i>
                                <p class="m-0 Main_row_col-3_CateNav_a_p">BÌNH LUẬN</p>
                            </a>
                        </li>
                        <li class="list-unstyled py-1">
                            <a class="text-decoration-none text-dark font-weight-bold d-flex align-items-center py-2 px-3 Main_row_col-3_CateNav_a"
                                href="{{ route('admincontact.index') }}">
                                <i class="fas fa-address-card mr-2 Main_row_col-3_CateNav_a_i text-center text-violet"></i>
                                <p class="m-0 Main_row_col-3_CateNav_a_p">LIÊN HỆ</p>
                            </a>
                        </li>
                        @endif
                        @endauth
                        <li class="list-unstyled py-1">
                            <a class="text-decoration-none text-dark font-weight-bold d-flex align-items-center py-2 px-3 Main_row_col-3_CateNav_a"
                                href="{{ route('home') }}">
                                <i class="fas fa-home mr-2 Main_row_col-3_CateNav_a_i text-center text-only"></i>
                                <p class="m-0 Main_row_col-3_CateNav_a_p">TRANG CHỦ</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-9 bg-lightwhite p-0">
                <div class="col-12 py-2 bg-whitesmoke d-flex justify-content-end align-items-center">
                    <div class="col-6 py-3 text-right">
                        <div class="dropdown">
                            <a class="text-white text-decoration-none py-2 px-4 bg-lightwhite text-dark rounded cursor"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <small class="font-small">
                                    {{ Auth::user()->name }}
                                </small>
                                <i class="ml-2 fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                    <i class="fas fa-key mr-2"></i>
                                    <p class="m-0 font-small">Đăng xuất</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 bg-secondary p-0 shadow-sm">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb rounded-0">
                            <li class="breadcrumb-item active font-weight-bold ml-3" aria-current="page">
                                @yield('title')
                            </li>
                        </ol>
                    </nav>
                </div>

                @section('content') @show
                <div class="mb-5"></div>

            </div>

            <div class="col-12 text-center py-3 bg-secondary" style="position: fixed; bottom: 0">
                <p class="m-0 text-white font-weight-bold">
                    DESIGN BY <a class="text-dark text-decoration-none"
                        href="https://www.facebook.com/hieupd21">JuyHiu</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Link JavaScript -->
    <script src="backend/js/jquery-3.5.1.slim.min.js"></script>
    <script src="backend/js/popper.min.js"></script>
    <script src="backend/js/bootstrap.min.js"></script>

    <script>
        // Change Image add product
        function changeImg(input){ 
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
      
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            });
        });     
    </script>
</body>

</html>
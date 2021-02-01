<!-- alert -->
<div class="alert alert-dark font-small alert-dismissible fade show rounded-0 m-0" role="alert">
    <div class="d-flex justify-content-between">
        <div class="info">
            <strong class="text-danger">GIẢM GIÁ!</strong> Bạn nên kiểm tra một số trường dưới đây.
        </div>

        <div class="social">
            <a class="text-decoration-none mr-3 text-lightpurple" href="">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a class="text-decoration-none mr-3 text-lightpurple" href="">
                <i class="fab fa-github"></i>
            </a>
            <a class="text-decoration-none mr-3 text-lightpurple" href="">
                <i class="fab fa-instagram"></i>
            </a>
            <a class="text-decoration-none mr-3 text-lightpurple" href="">
                <i class="fab fa-google"></i>
            </a>
        </div>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="text-lightpurple" aria-hidden="true">&times;</span>
    </button>
</div>

<!-- header -->
<div class="container Header">
    <div class="row justify-content-between align-items-center py-3 border-bottom">
        <div class="col-3 d-flex justify-content-center">
            <a class="d-flex align-items-center text-decoration-none text-lightpurple" href="{{route('home')}}">
                <i class="fas fa-star fa-3x mr-2"></i>
                <h3 class="m-0 font-weight-bold">LOCAL KAFE</h3>
            </a>
        </div>

        <div class="col-6">
            <ul class="d-flex justify-content-around align-items-center m-0">
                {{-- <li class="list-unstyled">
                    <a class="d-flex align-items-center text-decoration-none text-lightpurple" href="">
                        <i class="fas fa-star mr-2"></i>
                        <small class="m-0 text-lightpurple">WISHLIST</small>
                    </a>
                </li> --}}
                <li class="list-unstyled">
                    <a class="d-flex align-items-center text-decoration-none text-lightpurple"
                        href="{{ route('checkout.index') }}">
                        <i class="fas fa-meteor mr-2"></i>
                        <small class="m-0 text-lightpurple">THANH TOÁN</small>
                    </a>
                </li>
                <li class="list-unstyled">
                    <a class="d-flex align-items-center text-decoration-none text-lightpurple"
                        href="{{ route('cart.show') }}">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        <small class="m-0 text-lightpurple">GIỎ HÀNG ({{Cart::count()}})</small>
                    </a>
                </li>
                @if (Route::has('getLogin'))
                @auth
                @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                <li class="list-unstyled">
                    <a class="d-flex align-items-center text-decoration-none text-lightpurple"
                        href="{{ route('dashboard') }}">
                        <i class="fas fa-chart-line mr-2"></i>
                        <small class="m-0 text-lightpurple">BẢNG ĐIỀU KHIỂN</small>
                    </a>
                </li>
                @else
                <li class="list-unstyled dropdown">
                    <a class="d-flex align-items-center text-decoration-none text-lightpurple cursor"
                        id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fas fa-user mr-2 text-lightpurple"></i>
                        <small class="m-0 text-lightpurple text-uppercase">{{ Auth::user()->name }}</small>
                    </a>
                    <div class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('account.index') }}">
                            <i class="fas fa-user mr-2"></i>
                            <p class="m-0 font-small">Tài khoản</p>
                        </a>
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('history.index') }}">
                            <i class="fas fa-history mr-2"></i>
                            <p class="m-0 font-small">Lịch sử</p>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                            <i class="fas fa-key mr-2"></i>
                            <p class="m-0 font-small">Đăng xuất</p>
                        </a>
                    </div>
                </li>
                @endif
                @else
                <li class="list-unstyled">
                    <a class="d-flex align-items-center text-decoration-none text-lightpurple"
                        href="{{ route('getLogin') }}">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        <small class="m-0 text-lightpurple">ĐĂNG NHẬP</small>
                    </a>
                </li>
                @endauth
                @endif
            </ul>
        </div>
    </div>
</div>

<!-- topbar -->
<div class="container Topbar">
    <div class="row justify-content-between align-items-center py-2">
        <div class="col-6 menu-bar">
            <ul class="p-0 m-0 d-flex justify-content-between">
                <li class="list-unstyled">
                    <a class="text-decoration-none text-lightpurple" href="">
                        TRANG CHỦ
                    </a>
                </li>
                <li class="list-unstyled">
                    <a class="text-decoration-none text-lightpurple" href="{{route('home')}}">
                        CỬA HÀNG
                    </a>
                </li>
                <li class="list-unstyled">
                    <a class="text-decoration-none text-lightpurple" href="{{route('home.article')}}">
                        TIN TỨC
                    </a>
                </li>
                <li class="list-unstyled">
                    <a class="text-decoration-none text-lightpurple" href="{{ route('home.about') }}">
                        CHUYỆN CÀ PHÊ
                    </a>
                </li>
                <li class="list-unstyled">
                    <a class="text-decoration-none text-lightpurple" href="{{ route('contact.index') }}">
                        LIÊN HỆ
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-3">
            <form action="{{ route('home.search') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control rounded-0" name="result" placeholder="Tìm kiếm ...">
                </div>
            </form>
        </div>
    </div>
</div>
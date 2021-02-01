@extends('master')
@section('title', 'CHUYỆN CÀ PHÊ')
@section('content')
<div class="container Banner">
    <div class="row justify-content-center">
        <div class="col-12 p-0">
            <div class="img d-flex justify-content-center align-items-center Banner_row_col-12_img" style="background-image: url('frontend/img/banner.jpg');">
                <h1 class="font-weight-bold text-only font-lg pointer animate__animated animate__fadeInDown">
                    CHUYỆN CÀ PHÊ
                </h1>
            </div>
        </div>

        <div class="col-7 text-center my-4">
            <h1 class="m-0 font-weight-bold pointer text-uppercase animate__animated animate__fadeInLeft">
                Nó bắt đầu với một ý tưởng đơn giản:
            </h1>
            <h1 class="m-0 font-weight-bold pointer text-uppercase animate__animated animate__fadeInRight">
                Pha cà phê tuyệt vời.
                </h2>
                <p class="font-weight-bold mt-2 animate__animated animate__fadeInUp">
                    Mọi thứ chúng tôi làm đều bắt nguồn từ khái niệm cơ bản đó. Đó là điều thúc đẩy chúng tôi. Đó là điều thúc đẩy chúng tôi, thúc đẩy chúng tôi và khiến chúng tôi luôn hào hứng với các sản phẩm, dịch vụ của mình và tất cả những gì chúng tôi làm trong cộng đồng. Chúng tôi đam mê cà phê.
                </p>
        </div>

        <div class="col-12 p-0 mb-5">
            <div class="content d-flex justify-content-center align-items-center">
                <div class="img w-50 Banner_row_col-12_content_img-1 animate__animated animate__fadeInDown" style="background-image: url('frontend/img/our-coffee.png');"></div>
                <div class="desc w-50 animate__animated animate__fadeInRight">
                    <h1 class="text-only border-b d-inline-block font-weight-bold mx-4 pointer mb-4">
                        CÀ PHÊ CỦA CHÚNG TÔI</h1>
                    <p class="font-weight-bold mx-4 m-0">
                        Từ cây trồng đến quán cà phê đến cốc, <a class="text-lightpurple text-uppercase text-decoration-none"
                            href="{{route('home')}}">cà phê</a> đam mê mang đến cho bạn những ly cà phê hoàn hảo, được rang xay và pha trộn thành một công thức tạo mùi thơm và hương vị thơm ngon. Với sự trợ giúp của các nhà rang xay bậc thầy và thợ săn hạt của chúng tôi, hạt của chúng tôi được rang cẩn thận để mang đến cho bạn trải nghiệm cà phê tốt nhất mọi lúc.
                    </p>
                </div>
            </div>
            <div class="content d-flex justify-content-center align-items-center">
                <div class="desc w-50 animate__animated animate__fadeInLeft">
                    <h1 class="text-only border-b d-inline-block font-weight-bold mx-4 pointer mb-4">RANG CÀ PHÊ</h1>
                    <p class="font-weight-bold mx-4 m-0">
                        Nhà máy rang xay của chúng tôi tại Đà Nẵng là nơi tất cả điều kỳ diệu xảy ra, sử dụng công nghệ và cải tiến mới nhất để đảm bảo chất lượng cà phê cao nhất trong mỗi tách.
                    </p>
                    <p class="font-weight-bold mx-4 m-0">
                        Vì vậy, chúng tôi cam kết mang đến trải nghiệm cà phê tốt hơn cho mọi người.
                    </p>
                </div>
                <div class="img w-50 Banner_row_col-12_content_img-2 animate__animated animate__fadeInUp" style="background-image: url('frontend/img/roastery.png');"></div>
            </div>
        </div>
    </div>
</div>
@endsection
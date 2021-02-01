@extends('master')
@section('title', 'CHI TIẾT')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5 d-flex flex-column align-items-center">
            <div class="col-9 text-center">
                <h1 class="font-weight-bold text-uppercase">{{$art->art_title}}</h1>
                <div class="d-flex justify-content-center align-items-center mt-2">
                    <a class="text-decoration-none text-success font-weight-bold" href="{{ route('home.artcategory', [$art->articles_cate->cate_id, $art->articles_cate->cate_name]) }}">
                        {{ $art->articles_cate->cate_name }}
                    </a>
                    <p class="m-0 text-secondary font-weight-bold">&nbsp|
                        {{date('F j, Y', strtotime($art->created_at))}}</p>
                </div>
                <div class="text-left">
                    <p>{!! $art->art_content !!}</p>
                </div>
            </div>

            <div class="col-12 my-5">
                <h1 class="m-0 text-only font-weight-bold text-uppercase text-center">
                    bài viết liên quan
                </h1>

                <div class="col-12 d-flex flex-wrap">
                    @foreach ($art_rela as $item)
                    <div class="col-4 my-5">
                        <a class="text-decoration-none"
                            href="{{ route('home.artdetail', [$item->art_id, $item->art_slug]) }}">
                            <img class="Article_row_col-4_img"
                                style="background-image: url({{ asset('/storage/'.$item->art_image) }})">
                        </a>
                        <div class="mt-3">
                            <div class="d-flex align-items-center my-2">
                                <i class="fas fa-history mr-2 text-secondary"></i>
                                <p class="m-0 text-secondary font-weight-bold">
                                    {{date('d/m/Y', strtotime($item->created_at))}}
                                </p>
                            </div>
                            <a class="text-decoration-none"
                                href="{{ route('home.artdetail', [$item->art_id, $item->art_slug]) }}">
                                <h5 class="text-lightpurple font-weight-bold">{{$item->art_title}}</h5>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
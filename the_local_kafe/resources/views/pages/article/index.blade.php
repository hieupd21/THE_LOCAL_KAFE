@extends('master')
@section('title', 'TIN TỨC')
@section('content')
@include('layouts.slide')
<div class="container Article">
    <div class="row my-5">
        @include('layouts.article_categories')

        <div class="col-9 d-flex flex-wrap">
            <div class="col-md-12 my-3 text-center">
                <div class="title">
                    <h1 class="text-orange font-weight-bold text-only text-uppercase">TẤT CẢ BÀI VIẾT</h1>
                </div>
            </div>

            @foreach ($art as $item)
            <div class="col-6 my-3">
                <a class="text-decoration-none" href="{{ route('home.artdetail', [$item->art_id, $item->art_slug]) }}">
                    <img class="Article_row_col-4_img"
                        style="background-image: url({{ asset('/storage/'.$item->art_image) }})">
                </a>
                <div class="mt-3">
                    <a class="text-decoration-none" href="{{ route('home.artdetail', [$item->art_id, $item->art_slug]) }}">
                        <h5 class="text-lightpurple font-weight-bold">{{$item->art_title}}</h5>
                    </a>
                    <div class="d-flex align-items-center mt-2">
                        <i class="fas fa-history mr-2 text-secondary"></i>
                        <p class="m-0 text-secondary font-weight-bold">{{date('d/m/Y', strtotime($item->created_at))}}
                        </p>
                    </div>
                    <h6 class="mt-2">{{$item->art_description}}</h6>
                </div>
            </div>
            @endforeach

            <div class="col-12 d-flex justify-content-center">
                {!! $art->render() !!}
            </div>

        </div>
    </div>
</div>
@endsection
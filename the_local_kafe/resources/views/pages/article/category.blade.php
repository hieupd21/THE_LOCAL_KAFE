@extends('master')
@section('title', 'LOẠI SẢN PHẨM')
@section('content')
@include('layouts.slide')
<div class="container Content">
    <div class="row my-5">
        @include('layouts.article_categories')

        <div class="col-9 d-flex flex-wrap">

            <div class="col-md-12 mb-3 text-center animate__animated animate__fadeInRight">
                <div class="title d-inline-block">
                    <h1 class="text-only font-weight-bold text-uppercase border-b">{{$cate_name->cate_name}}</h1>
                </div>
            </div>

            @foreach ($articles as $item)
            <div class="col-6 my-5">
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

            <div class="col-12 d-flex justify-content-center animate__animated animate__fadeInUp">
                {{ $articles->render() }}
            </div>
        </div>
    </div>
</div>    
@endsection
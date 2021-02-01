<div class="col-3">
    <div class="col-12">
        <div class="title d-flex align-items-center text-orange border-b-orange pb-3">
            <i class="fas fa-newspaper fa-lg text-secondary"></i>
            <h5 class="font-weight-bold text-only m-0 ml-4">THỂ LOẠI</h5>
        </div>
        <ul class="p-0 ml-2 my-3">
            @foreach ($art_cate as $item)
            <li class="list-unstyled py-2 text-secondary">
                <i class="fas fa-angle-right mr-2"></i>
                <a class="text-decoration-none text-lightpurple text-uppercase"
                    href="{{ route('home.artcategory', [$item->cate_id, $item->cate_name]) }}">{{$item->cate_name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
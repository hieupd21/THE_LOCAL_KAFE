<div class="col-3">
    <div class="col-12">
        <div class="title d-flex align-items-center text-orange border-b-orange pb-3">
            <i class="fas fa-coffee fa-lg text-secondary"></i>
            <h5 class="font-weight-bold text-only m-0 ml-4">THỂ LOẠI</h5>
        </div>
        <ul class="p-0 ml-2 my-3">
            @foreach ($prod_cate as $item)
            <li class="list-unstyled py-2 text-secondary">
                <i class="fas fa-angle-right mr-2"></i>
                <a class="text-decoration-none text-lightpurple text-uppercase"
                    href="{{ route('home.prodcategory', [$item->cate_id, $item->cate_name]) }}">{{$item->cate_name}}</a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="col-12 my-5">
        <div class="title d-flex align-items-center text-orange border-b-orange pb-3">
            <i class="fas fa-filter fa-lg text-secondary"></i>
            <h5 class="font-weight-bold text-only m-0 ml-4">BỘ LỌC GIÁ</h5>
        </div>

        <div class="slider my-5">
            <form action="{{ route('home.filter') }}" method="GET"
                class="d-flex flex-column align-items-center justify-content-center">
                @csrf
                <div class="text text-center Categories_row_col-4_col-12_text ml-5 mb-3">
                    <p class="Categories_row_col-4_col-12_p m-0 font-weight-bold" id="rangeValue">{{ $price }}</p>
                </div>
                <input class="Categories_row_col-4_col-12_input" type="range" min="0" max="50" name="price"
                    oninput="rangeValue.innerText = this.value">
                <button class="btn btn-lightpurple rounded-0 mt-4 px-4 font-weight-bold text-uppercase">
                    LỌC GIÁ
                </button>
            </form>
        </div>
    </div>
</div>
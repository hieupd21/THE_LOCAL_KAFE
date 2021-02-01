@extends('admin.master')
@section('title', 'SỬA SẢN PHẨM')
@section('content')
<div class="col-12 d-flex">
    <div class="col-1 mr-5">
        <form action="{{ route('product.index') }}" method="get">
            <button type="submit" class="btn btn-danger text-uppercase mt-2 font-weight-bold">
                <i class="fas fa-reply fa-lg"></i>
            </button>
        </form>
    </div>
    <div class="col-9 mb-3">
        @include('error.note')
        <form action="{{ route('product.update', $prod->prod_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="text-uppercase font-weight-bold">tên</label>
                <input type="text" class="form-control" name="name" value="{{$prod->prod_name}}" required>
            </div>
            <div class="form-group">
                <label class="text-uppercase font-weight-bold">giá</label>
                <input type="text" class="form-control" name="price" min="0" value="{{$prod->prod_price}}" required>
            </div>
            <div class="form-group">
                <label class="text-uppercase font-weight-bold">hình ảnh</label>
                <input type="file" class="form-control-file hidden" name="image" onchange="changeImg(this)">
                <img id="avatar" class="img-thumbnail" src="{{ asset('/storage/'.$prod->prod_image) }}" width="200px">
            </div>
            <div class="form-group">
                <label class="text-uppercase font-weight-bold">giảm giá</label>
                <select class="form-control font-weight-bold text-success" name="discount" required>
                    <option value="0" @if ($prod->prod_discount==0) selected @endif>
                        0%
                    </option>
                    <option value="5" @if ($prod->prod_discount==5) selected @endif>
                        5%
                    </option>
                    <option value="10" @if ($prod->prod_discount==10) selected @endif>
                        10%
                    </option>
                    <option value="15" @if ($prod->prod_discount==15) selected @endif>
                        15%
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label class="text-uppercase font-weight-bold">số lượng</label>
                <input type="number" class="form-control font-weight-bold text-success" name="quantity" min="0" value="{{$prod->prod_quantity}}" required>
            </div>
            <div class="form-group">
                <label class="text-uppercase font-weight-bold">mô tả</label>
                <textarea class="form-control" id="editor1" name="description" name="description" required>
                    {{$prod->prod_description}}
                </textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            </div>
            <div class="form-group">
                <label class="text-uppercase font-weight-bold">sản phẩm tiêu biểu</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="featured" value="yes" 
                    @if ($prod->prod_featured=='yes') 
                        checked
                    @endif>
                    <label class="form-check-label text-uppercase font-weight-bold text-primary">
                        có
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="featured" value="no" 
                    @if ($prod->prod_featured=='no') 
                        checked
                    @endif>
                    <label class="form-check-label text-uppercase font-weight-bold text-danger">
                        không
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="text-uppercase font-weight-bold">thể loại sản phẩm</label>
                <select class="form-control font-weight-bold" name="categories" required>
                    @foreach ($cate as $value)
                    <option value="{{$value->cate_id}}" @if ($prod->prod_cate==$value->cate_id) selected @endif>{{$value->cate_name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary text-uppercase font-weight-bold px-3">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
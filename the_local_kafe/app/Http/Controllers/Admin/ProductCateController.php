<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductCateRequest;
use App\Http\Requests\UpdateProductCateRequest;
use App\ProductCate;
use Illuminate\Http\Request;

class ProductCateController extends Controller
{
    public function index() {
        $categories = ProductCate::paginate(5);
        return view('admin.category.prod-index', compact('categories'));
    }

    public function create(AddProductCateRequest $request) {
        $category = new ProductCate;
        $category->cate_name = $request->name;
        $category->save();
        
        return redirect()->route('productcate.index');
    }

    public function edit($id) {
        $category = ProductCate::find($id);      
        return view('admin.category.prod-edit', compact('category'));
    }

    public function update(UpdateProductCateRequest $request, $id) {
        $category = ProductCate::find($id);
        $category->cate_name = $request->name;
        $category->save();
        
        return redirect()->route('productcate.index');
    }

    public function delete($id) {
        ProductCate::destroy($id);

        return redirect()->route('productcate.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\ProductCate;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select()->join('products_cate', 'products.prod_cate', '=', 'products_cate.cate_id')
                                     ->orderByDesc('prod_id')
                                     ->paginate(10);

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCate::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(AddProductRequest $request)
    {
        $imagePath = request('image')->store('uploads', 'public');

        $prod = new Product;
        $prod->prod_name = $request->name;
        $prod->prod_price = $request->price;
        $prod->prod_image = $imagePath;
        $prod->prod_quantity = $request->quantity;
        $prod->prod_description = $request->description;
        $prod->prod_featured = $request->featured;
        $prod->prod_discount = $request->discount;
        $prod->prod_cate = $request->categories;
        $prod->save();

        return redirect()->route('product.index')->with('success', 'Insert Data Successfully');
    }

    public function show($id) {
        $prod_cate = Product::select()->join('products_cate', 'products.prod_cate', '=', 'products_cate.cate_id')
                                      ->where('prod_id', $id)
                                      ->first();

        return view('admin.product.show', compact('prod_cate'));
    }

    public function edit($id)
    {
        $prod = Product::find($id);
        $cate = ProductCate::all();

        return view('admin.product.edit', compact('prod', 'cate'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $prod = Product::find($id);
        $image = request('image');

        if ($prod->prod_image == null) {
            $imagePath = request('image')->store('uploads', 'public');
            $prod->prod_name = $request->name;
            $prod->prod_price = $request->price;
            $prod->prod_image = $imagePath;
            $prod->prod_quantity = $request->quantity;
            $prod->prod_description = $request->description;
            $prod->prod_featured = $request->featured;
            $prod->prod_discount = $request->discount;
            $prod->prod_cate = $request->categories;
        } else {
            if ($image) {
                $detinationPath = 'storage/' . $prod->prod_image;
                if (file_exists($detinationPath)) {
                    unlink($detinationPath);
                }
                $imagePath = request('image')->store('uploads', 'public');
                $prod->prod_name = $request->name;
                $prod->prod_price = $request->price;
                $prod->prod_image = $imagePath;
                $prod->prod_quantity = $request->quantity;
                $prod->prod_description = $request->description;
                $prod->prod_featured = $request->featured;
                $prod->prod_discount = $request->discount;
                $prod->prod_cate = $request->categories;
            } else {
                $prod->prod_name = $request->name;
                $prod->prod_price = $request->price;
                $prod->prod_quantity = $request->quantity;
                $prod->prod_description = $request->description;
                $prod->prod_featured = $request->featured;
                $prod->prod_discount = $request->discount;
                $prod->prod_cate = $request->categories;
            }
            $prod->save();
        }
        $prod->save();

        return redirect()->route('product.index')->with('update', 'Update Data Successfully');
    }

    public function delete($id)
    {
        $prod = Product::find($id);
        $detinationPath = 'storage/' . $prod->prod_image;
        if (file_exists($detinationPath)) {
            unlink($detinationPath);
        }
        $prod->delete();

        return redirect()->route('product.index')->with('delete', 'Delete Data Successfully');
    }
}

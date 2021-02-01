<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show() {
        $total = Cart::total();
        $subtotal = Cart::subtotal();
       
        $tax = Cart::tax();
        $cart = Cart::content();

        return view('pages.cart', compact('cart', 'total', 'subtotal', 'tax'));
    }

    public function update() {
        $rowid = request('rowId');
        $quantity = request('quantity');

        Cart::update($rowid, $quantity);
        return redirect()->route('cart.show');
    }

    public function add($id) {
        $quantity = request('qty');
        $prod = Product::find($id);
        
        $data['id'] = $prod->prod_id;
        $data['name'] = $prod->prod_name;
        $data['qty'] = $quantity;
        $data['weight'] = '1';
        $data['options']['maxQty'] = $prod->prod_quantity;
        $data['price'] = $prod->prod_price;
        $data['options']['image'] = $prod->prod_image;
        $data['options']['discount'] = $prod->prod_discount;

        Cart::add($data);
        
        return redirect()->route('cart.show');
    }

    public function quick_add($id) {
        $prod = Product::find($id);

        $data['id'] = $prod->prod_id;
        $data['name'] = $prod->prod_name;
        $data['qty'] = '1';
        $data['weight'] = '1';
        $data['price'] = $prod->prod_price;
        $data['options']['maxQty'] = $prod->prod_quantity;
        $data['options']['image'] = $prod->prod_image;
        $data['options']['discount'] = $prod->prod_discount;

        Cart::add($data);
        
        return redirect()->route('cart.show');
    }

    public function delete($rowId) {
        Cart::remove($rowId);

        return back();
    }
}

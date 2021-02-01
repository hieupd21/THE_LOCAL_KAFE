<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();
        $cart = Cart::content();

        return view('pages.checkout', compact('total', 'subtotal', 'tax', 'cart'));
    }

    public function alert()
    {
        return view('pages.alert');
    }

    public function add(Request $request)
    {
        $order = new Order;
        $order->order_address = $request->address;
        $order->order_total = $request->total;
        $order->order_description = $request->description;
        $order->order_user = $request->user;
        $order->order_status = 1;
        $order->save();

        $cart = Cart::content();

        foreach ($cart as $item) {
            $prod = new Product;
            $order_detail = new OrderDetail;
            $products = Product::find($item->id);

            $prod->prod_price = $item->price;
            $prod->prod_id = $item->id;

            if ($item->qty >= $item->options->maxQty) {
                $order_detail->detail_quantity = $item->options->maxQty;
                $order_detail->detail_price = $prod->prod_price * $item->options->maxQty;
            } else {
                $order_detail->detail_quantity = $item->qty;
                $order_detail->detail_price = $prod->prod_price * $item->qty;
            }
            $products->prod_quantity = $products->prod_quantity - $order_detail->detail_quantity;

            $prod->prod_quantity = $prod->prod_quantity - $order_detail->detail_quantity;
            $order_detail->detail_prod = $prod->prod_id;
            $order_detail->detail_order = $order->order_id;

            $order_detail->save();
            $products->save();
        }

        Cart::destroy();

        return redirect()->route('checkout.alert');
    }
}

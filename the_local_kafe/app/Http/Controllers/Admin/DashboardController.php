<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\ArticleCate;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\ProductCate;
use App\User;
use App\Comment;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $product = Product::count('prod_id');
        $article = Article::count('art_id');
        $category = ProductCate::count('cate_id') + ArticleCate::count('cate_id');
        $user = User::count('id');
        $order = Order::count('order_id');
        $comment = Comment::count('cmt_id');
        $contact = Contact::count('cont_id');
        return view('admin.index', compact('product', 'article', 'category', 'user', 'order', 'comment', 'contact'));
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('getLogin');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        $cmts = Comment::select()->join('users', 'users.id', '=', 'comments.cmt_user')
                                 ->join('products', 'products.prod_id', '=', 'comments.cmt_prod')
                                 ->orderBy('cmt_id', 'desc')
                                 ->paginate(10);

        return view('admin.comment.index', compact('cmts'));
    }

    public function delete($id) {
        $cmt = Comment::find($id);
        $cmt->delete();

        return redirect()->route('comment.index')->with('delete', 'Delete Data Successfully');
    }
}

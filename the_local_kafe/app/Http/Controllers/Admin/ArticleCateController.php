<?php

namespace App\Http\Controllers\Admin;

use App\ArticleCate;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddArticleCateRequest;
use App\Http\Requests\UpdateArticleCateRequest;
use Illuminate\Http\Request;

class ArticleCateController extends Controller
{
    public function index() {
        $categories = ArticleCate::paginate(5);
        return view('admin.category.article-index', compact('categories'));
    }

    public function create(AddArticleCateRequest $request) {
        $category = new ArticleCate;
        $category->cate_name = $request->name;
        $category->save();
        
        return redirect()->route('articlecate.index');
    }

    public function edit($id) {
        $category = ArticleCate::find($id);      
        return view('admin.category.article-edit', compact('category'));
    }

    public function update(UpdateArticleCateRequest $request, $id) {
        $category = ArticleCate::find($id);
        $category->cate_name = $request->name;
        $category->save();
        
        return redirect()->route('articlecate.index');
    }

    public function delete($id) {
        ArticleCate::destroy($id);

        return redirect()->route('articlecate.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\ArticleCate;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select()->join('articles_cate', 'articles.art_cate', '=', 'articles_cate.cate_id')
                                     ->orderByDesc('art_id')
                                     ->paginate(10);
        return view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        $categories = ArticleCate::all();
        return view('admin.article.create', compact('categories'));
    }

    public function store(AddArticleRequest $request)
    {
        $imagePath = request('image')->store('uploads', 'public');

        $art = new Article;
        $art->art_title = $request->title;
        $art->art_slug = Str::slug($request->title, '-');
        $art->art_image = $imagePath;
        $art->art_description = $request->description;
        $art->art_content = $request->content;
        $art->art_cate = $request->categories;
        $art->save();

        return redirect()->route('article.index')->with('success', 'Insert Data Successfully');
    }

    public function show($id)
    {
        $art_cate = Article::select()->join('articles_cate', 'articles.art_cate', '=', 'articles_cate.cate_id')
                                     ->where('art_id', $id)
                                     ->first();

        return view('admin.article.show', compact('art_cate'));
    }

    public function edit($id)
    {
        $art = Article::find($id);
        $cate = ArticleCate::all();

        return view('admin.article.edit', compact('art', 'cate'));
    }

    public function update(UpdateArticleRequest $request, $id)
    {
        $art = Article::find($id);
        $image = request('image');

        if ($art->art_image == null) {
            $imagePath = request('image')->store('uploads', 'public');
            $art->art_title = $request->title;
            $art->art_slug = Str::slug($request->title, '-');
            $art->art_image = $imagePath;
            $art->art_description = $request->description;
            $art->art_content = $request->content;
            $art->art_cate = $request->categories;
        } else {
            if ($image) {
                $detinationPath = 'storage/' . $art->art_image;
                if (file_exists($detinationPath)) {
                    unlink($detinationPath);
                }
                $imagePath = request('image')->store('uploads', 'public');
                $art->art_title = $request->title;
                $art->art_slug = Str::slug($request->title, '-');
                $art->art_image = $imagePath;
                $art->art_description = $request->description;
                $art->art_content = $request->content;
                $art->art_cate = $request->categories;
            } else {
                $art->art_title = $request->title;
                $art->art_slug = Str::slug($request->title, '-');
                $art->art_description = $request->description;
                $art->art_content = $request->content;
                $art->art_cate = $request->categories;
            }
            $art->save();
        }
        $art->save();

        return redirect()->route('article.index')->with('update', 'Update Data Successfully');
    }

    public function delete($id)
    {
        $art = Article::find($id);
        $detinationPath = 'storage/' . $art->art_image;
        if (file_exists($detinationPath)) {
            unlink($detinationPath);
        }
        $art->delete();

        return redirect()->route('article.index')->with('delete', 'Delete Data Successfully');
    }
}

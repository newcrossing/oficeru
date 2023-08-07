<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function listing()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => "Статьи"],
        ];

        $posts = Post::where('pub', '1')->where('type', 'post')->orderBy('id', 'desc')->paginate(15);
        $tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();
        return view('frontend.news.list', compact('posts', 'breadcrumbs'));
    }

    public function single($id)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/post", 'name' => " Статьи "],
        ];

        $post = Post::where('pub', 1)->where('type', 'post')->findOrFail($id);

        return view('frontend.news.index', compact('post', 'breadcrumbs'));
    }
}

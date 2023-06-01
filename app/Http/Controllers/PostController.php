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
            ['name' => " Статьи"],
        ];

        $posts = Post::where('pub', '1')->where('type', 'post')->orderBy('id', 'desc')->paginate(15);
        $tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();
        return view('front.post.list', compact('posts', 'tags', 'breadcrumbs'));
    }

    public function single($id)
    {
        $post = Post::where('pub', 1)->where('type', 'post')->findOrFail($id);
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/post", 'name' => " Статьи "],
            ['name' => $post->name],
        ];

        return view('front.post.index', compact('post', 'breadcrumbs'));
    }
}

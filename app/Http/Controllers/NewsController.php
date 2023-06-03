<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function listing()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Новости"],
        ];

        $posts = Post::where('pub', '1')->where('type', 'news')->orderBy('id', 'desc')->paginate(15);

        return view('frontend.news.list', compact('posts', 'breadcrumbs'));
    }

    public function single($id)
    {
        $post = Post::where('pub', 1)->where('type', 'news')->findOrFail($id);
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/post", 'name' => " Новости "],
            ['name' => $post->name],
        ];

        return view('frontend.news.index', compact('post', 'breadcrumbs'));
    }
}

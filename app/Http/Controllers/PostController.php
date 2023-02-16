<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use App\Models\Document as Doc;
use App\Models\Izm;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listing()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Статьи"],
        ];

        $posts = Post::where('pub', '1')->orderBy('id', 'desc')->paginate(15);
        $tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();
        return view('front.post.list', compact('posts', 'tags', 'breadcrumbs'));
    }

    public function single($id)
    {
        $post = Post::where('pub', 1)->findOrFail($id);
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/post", 'name' => " Статьи "],
            ['name' => $post->name],
        ];
        //$tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();
        return view('front.post.index', compact('post', 'breadcrumbs'));
    }
}

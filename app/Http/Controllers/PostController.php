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

        $bots = array(
            'rambler', 'googlebot', 'aport', 'yahoo', 'msnbot', 'turtle', 'mail.ru', 'omsktele',
            'yetibot', 'picsearch', 'sape.bot', 'sape_context', 'gigabot', 'snapbot', 'alexa.com',
            'megadownload.net', 'askpeter.info', 'igde.ru', 'ask.com', 'qwartabot', 'yanga.co.uk',
            'scoutjet', 'similarpages', 'oozbot', 'shrinktheweb.com', 'aboutusbot', 'followsite.com',
            'dataparksearch', 'google-sitemaps', 'appEngine-google', 'feedfetcher-google',
            'liveinternet.ru', 'xml-sitemaps.com', 'agama', 'metadatalabs.com', 'h1.hrn.ru',
            'googlealert.com', 'seo-rus.com', 'yaDirectBot', 'yandeG', 'yandex',
            'yandexSomething', 'Copyscape.com', 'AdsBot-Google', 'domaintools.com',
            'Nigma.ru', 'bing.com', 'dotnetdotcom'
        );
        foreach ($bots as $bot)
            if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== true) {
                $post->hits = $post->hits + 1;
                $post->save();
            }

        $post->hits = 133;
        $post->save();
        return view('front.post.index', compact('post', 'breadcrumbs'));
    }
}

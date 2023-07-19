<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    public function listing()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Метки "],
        ];
        $tag = Tag::find();
        $posts = Post::where('pub', '1')->where('type', 'news')->orderBy('id', 'desc')->paginate(15);

        return view('front.news.list', compact('posts', 'breadcrumbs'));
    }

    public function single($id)
    {
        $tag = Tag::where('slug', $id)->firstOrFail();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/tag", 'name' => " Метки "],
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
        $tmp = false;
        foreach ($bots as $bot)
            if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false) {
                $tmp = true;
            }
        if (!$tmp) {
            $tag->hits = $tag->hits + 1;
            $tag->save();
        }
        $posts = $tag->posts()-get();
        $docs = $tag->docs()->get();
        $contents = collect()->merge($posts)->merge($docs)->sortByDesc('updated_at');

        return view('front.tag.list', compact('contents', 'tag', 'breadcrumbs'));
    }
}

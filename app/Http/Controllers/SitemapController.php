<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Document ;

class SitemapController extends Controller
{
    public function document()
    {
        $products= Document::where('pub',1)->latest()->get();
        $news= Post::where('pub',1)->latest()->get();
        return response ()->view ('sitemap.document', [
            'products' => $products,
            'news' => $news,
        ])->header ('Content-Type', 'text/xml');
    }
}

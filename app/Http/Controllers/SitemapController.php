<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document ;

class SitemapController extends Controller
{
    public function document()
    {
        $products= Document::where('pub',1)->latest()->get();
        return response ()->view ('sitemap.document', [
            'products' => $products,
        ])->header ('Content-Type', 'text/xml');
    }
}

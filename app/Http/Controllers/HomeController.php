<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Document;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Tag;
use App\Helpers\Activity;
use Carbon\Carbon;
use QrCode;
use Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $countDoc = Document::all()->count();
        $freshPubDoc = Document::whereNotNull('date_pub')
            ->orderByDesc('date_pub')
            ->limit(3)
            ->get();

        $news = Post::whereNotNull('date_public')
            ->where('pub','1')
            ->where('type','news')
            ->orderByDesc('date_public')
            ->limit(3)
            ->get();

        $freshVstDoc = Document::whereNotNull('date_vst')
            ->where('date_vst', '>=', Carbon::now()->format('Y-m-d'))
            ->orderBy('date_vst')
            ->limit(3)
            ->get();
        $inMainDoc = Document::where('in_main', '1')->orderByDesc('id')->limit(6)->get();

        return view('frontend.home.index', compact('countDoc', 'freshPubDoc',
            'freshVstDoc',
            'inMainDoc',
            'news'
        ));

    }
}

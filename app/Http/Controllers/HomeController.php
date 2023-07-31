<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Document;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Tag;
use App\Helpers\Activity;
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
        $freshPubDoc = Document::whereNotNull('date_pub')->orderByDesc('date_pub')->limit(5)->get();
        $freshVstDoc = Document::whereNotNull('date_vst')->orderByDesc('date_vst')->limit(5)->get();

      //  return view('front.home.index',compact('breadcrumbs','countDoc','freshPubDoc','freshVstDoc'));
        return view('frontend.home.index',compact('countDoc','freshPubDoc','freshVstDoc'));

    }
}

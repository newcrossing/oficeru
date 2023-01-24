<?php

namespace App\Http\Controllers;

use App\Models\Board;
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
       // QrCodeQRCode::text('QR Code Generator for !')->setOutfile('/dd.svg');
        $users_chek = DB::table('users')->where('deleted_at', '!=', null)->whereNotNull('tel')->count();
        $sliders = Slider::where('active', 1)->get();
        $socials = Social::where('active', 1)->get();
        return view('frontend.home.index', compact('users_chek', 'sliders', 'socials'));

    }
}

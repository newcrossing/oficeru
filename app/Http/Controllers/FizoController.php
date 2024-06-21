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


class FizoController extends Controller
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


        return view('frontend.fizo.index');

    }
}

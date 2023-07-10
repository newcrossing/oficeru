<?php

namespace App\Http\Controllers;

use App\Mail\NewDocMail;
use App\Mail\NotifyMail;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


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
        $breadcrumbs = [
            ['name' => "Главная"],
        ];

        $countDoc = Document::all()->count();
        $freshPubDoc = Document::whereNotNull('date_pub')->orderByDesc('date_pub')->limit(5)->get();
        $freshVstDoc = Document::whereNotNull('date_vst')->orderByDesc('date_vst')->limit(5)->get();

        return view('front.home.index', compact('breadcrumbs', 'countDoc', 'freshPubDoc', 'freshVstDoc'));

    }
}

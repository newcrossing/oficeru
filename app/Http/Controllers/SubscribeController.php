<?php

namespace App\Http\Controllers;

use App\Mail\NewDocMail;
use App\Mail\NotifyMail;
use App\Models\Document;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

class SubscribeController extends Controller
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

        return view('front.subscribe.index', compact('breadcrumbs'));

    }

    public function create(Request $request)
    {
        $breadcrumbs = [
            ['name' => "Главная"],
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'sometimes|nullable|email:rfc,dns',
        ], [
            'email.email' => 'E-mail не соответствует действительности!',
        ]);
        if ($validator->fails()) {
            return redirect('/subscribe')
                ->withErrors($validator)
                ->withInput();
        }

        // если есть такой пользователь
        if (User::where('email', $request->email)->get()->count()) {
            return redirect('/subscribe')
                ->withErrors(['msg' => 'Пользователь с таким e-mail уже существует.<br>Для настройки рассылки зайдите в <a href="/login"> личный кабинет.</a>'])
                ->withInput();
        }

        $user = new User();
        $user->password = Hash::make('the-password-of-choice');
        $user->email = $request->email;
        $user->name = '';
        $user->notify_doc = 1;
        $user->save();


        return view('front.subscribe.ok',
            compact('breadcrumbs')
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use App\Mail\ContactMail;
use App\Mail\NewDocMail;
use App\Mail\VerificationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }



    public function ok()
    {
        return view('frontend.contact.ok');
    }

    public function send(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'text' => 'required',
            'captcha' => 'required|captcha',
        ], [
            'name.required' => 'Название должно быть заполнено!',
            'name.min' => 'Минимальная длина поля 3 символа!',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['text'] = $request->text;
        Mail::to('newcrossing@gmail.com')->queue(new ContactMail($data));

        Activity::add('Отправлено сообщение через Контакт от  ' . $request->email);

        return redirect()->route('contact.ok')->with('success', 'Сохранено.');

    }
}

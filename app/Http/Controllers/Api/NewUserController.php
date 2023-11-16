<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewUserController extends Controller
{
    //
    public function create($email, $from, Request $request)
    {
        $data = ['email' => $email, 'from' => $from];

        $validator = Validator::make($data, [
            'email' => 'required|email|unique:users',
            'from' => 'required',
        ]);

        if ($validator->fails()) {
            Log::info(sprintf('Ошибка регистрации (с сайта %s): %s ', $from, $email), $validator->errors()->all());
            return response()->json(array('success' => false));
        }

        $user = User::create(
            [
                'email' => $data['email'],
                'password' => Hash::make(Str::random(10)),
                'notify_vst' => 1,
                'notify_edit' => 1,
                'notify_doc' => 1,
            ]
        );
        $user->assignRole('user');

        // отправка подтверждения
        $data['VerificationEmail'] = URL::signedRoute('verification_email', ['email' => $data['email']]);
        Mail::to($data['email'])->queue(new VerificationEmail($data));

        //Activity::add(sprintf('Регистрация на сайте (с сайта %s): %s', $from, $email));
        Log::info(sprintf('Регистрация на сайте (с сайта %s): %s', $from, $email));
        return response()->json(array('success' => true));

    }
}

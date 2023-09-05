<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            //Log::error('Ошибка регистрации', $validator->errors()->all());


            Activity::add(sprintf('Ошибка регистрации (удаленная с сайта %s): %s ', $from, $email), Activity::ERROR);
            //abort(404);
            // return err;
            return response()->json(array('success' => false));
        }


        $user = User::create(
            [
                'email' => $data['email'],
                'password' => Hash::make(Str::random(10))
            ]
        );
        $user->assignRole('user');


        Activity::add(sprintf('Регистрация на сайте (удаленная с сайта %s): %s', $from, $email), Activity::SUCCESS);

        return $email;

    }
}

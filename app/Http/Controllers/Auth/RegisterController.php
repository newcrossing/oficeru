<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewDocMail;
use App\Mail\VerificationEmail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     *
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/verification-email/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                // 'name' => ['required', 'string', 'max:60', 'min:3'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ],
            [
//                'name.required' => 'Поле обязательно для заполнения',
//                'name.max' => 'Максимальный размер поля 60 символов',
//                'name.min' => 'Минимальный размер поля 3 символа',
//                'name.string' => 'Допускаются только текстовые симовлы',
                'email.required' => 'Поле обязательно для заполнения',
                'email.string' => 'Допускаются только текстовые симовлы',
                'email.email' => 'Укажите в формате email ',
                'email.unique' => 'Указанный email уже используется. Восстановите пароль, если забыли.',
                'password.required' => 'Поле обязательно для заполнения',
                'password.min' => 'Минимальный размер пароля 6 символа',
                'password.confirmed' => 'Пароли не совпадают',
            ]
        );
    }


    /**
     * Отображение формы регистрации
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create(
            [
                // 'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );
        $user->assignRole('user');

//        $data['VerificationEmail'] = URL::signedRoute('verification_email', ['email' => $data['email']]);
//        Mail::to($data['email'])->queue(new VerificationEmail($data));

        return $user;
         //return redirect('/');
    }
}

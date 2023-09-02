<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        // todoo реализовать проверку чекбоксов на сервере
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Activity::add('Авторизация на сайте: ' . $request->email);
            return redirect()->intended('/profile/');
        }

        Activity::add('Авторизации на сайте. Неверные данные.', Activity::WARNING);
        return back()->withErrors([
            'login' => 'Неверный логин или пароль.',
        ]);
    }


    /**
     * Разлогиниться
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Activity::add('Вышел из сайта');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/');
    }

}

<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use App\Mail\VerificationEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use LaravelQRCode\Facades\QRCode;

class ProfileController extends Controller
{

    public function password_reset()
    {

       // return view('frontend.auth.reset');

    }


    public function verification_email_send(Request $request)
    {
        if (Auth::user()->email_verified_at) {
            dd('Ошибка ');
        }
        $data['VerificationEmail'] = URL::signedRoute('verification_email', ['email' => Auth::user()->email]);
        Mail::to(Auth::user()->email)->queue(new VerificationEmail($data));
        $text = ['email' => Auth::user()->email];

        return view('frontend.profile.verification_email.send-ok', compact('text'));

    }

    public function verification_email(Request $request)
    {
        // проверка
        if (!$request->hasValidSignature()) {
            abort(401);
        } else {
            $text = ['email' => $request->email];
            $user = User::where('email', $request->email)->first();

            if ($user->email_verified_at) {
                return view('frontend.profile.verification_email.reactive', compact('text'));
            }
            $user->email_verified_at = Carbon::now()->timestamp;
            $user->save();

            return view('frontend.profile.verification_email.ok', compact('text'));
        }
    }

    public function settings()
    {
        return view('frontend.profile.main');
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // dd($request);
        $request->validate([
            'name' => 'nullable|string|max:50|min:2',
            'password' => 'nullable|confirmed|min:6',
            'image' => 'nullable|image|max:2000|mimes:jpeg,png,bmp',
        ], [
            'password.confirmed' => 'Пароли должны совпадать!',
            'password.min' => 'Минимальная длина пароля 6 символов!',
            'image.max' => 'Максимальный размер фотографии 2 Мб!',
        ]);

        $data = $request->all();
        // сохраняем фото при наличии
        if ($request->hasFile('image')) {
            $newFileName = time() . '.' . $data['image']->extension();
            Image::make($data['image'])->widen(300)->save(Storage::path('/public/avatars/300/') . $newFileName);
            Image::make($data['image'])->widen(160)->save(Storage::path('/public/avatars/160/') . $newFileName);
            Image::make($data['image'])->widen(100)->save(Storage::path('/public/avatars/50/') . $newFileName);
            $user->foto = $newFileName;
        }
        //сброс фото
        if ($request->reset_foto) {
            Storage::delete('/public/avatars/300/' . $user->foto);
            $user->foto = null;
            $user->save();
            return redirect()->back()->with('success', 'Фото удалено');
        }

        if ($request->password && $request->password_confirmation && ($request->password_confirmation == $request->password)) {
            $user->password = Hash::make($request->password);
            Activity::add('Пользователь изменил пароль');
        }
        //dd($data);
        $user->fill($data);
        $user->save();

        Activity::add('Пользователь изменил профиль');

        return redirect()->back()->with('success', 'Сохранено');
    }
}

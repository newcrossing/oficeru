<?php

namespace App\Http\Controllers\Adm;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use LaravelQRCode\Facades\QRCode;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $breadcrumbs = [
            ['link' => "/admin/", 'name' => "Главная"],
            ['name' => " Пользователи"]
        ];
        return view('backend.pages.user.index', compact('users', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->redirect == 'cancel') {
            return redirect()->route('user.index');
        }

        $request->validate([
            'login' => 'required|string|max:255|min:3|regex:/^[a-z][a-z0-9]+$/i|unique:users',
            'password' => 'required|max:30|min:3',
        ], [
            'login.unique' => 'Поле ЛОГИН должно быть уникально!',
            'login.required' => 'Поле ЛОГИН обязательно!',
            'login.min' => 'Минимальная длина поля 3 символа!',
            'login.max' => 'Максимальная длина поля 255 символов!',
            'password.min' => 'Минимальная длина пароля 3 символа!',
            'password.max' => 'Максимальная длина пароля 30 символов!',
        ]);
        $user = new User();

        if ($request->hasFile('image')) {
            $newFileName = time() . '.' . $request['image']->extension();
            Image::make($request['image'])->widen(300)->save(Storage::path('/public/avatars/300/') . $newFileName);
            Image::make($request['image'])->widen(100)->save(Storage::path('/public/avatars/50/') . $newFileName);
            $user->foto = $newFileName;
        }
        $request['notify_email'] = $request['notify_email'] ? '1' : null;
        $request['notify_tel'] = $request['notify_tel'] ? '1' : null;
        $request['notify_whatsup'] = $request['notify_whatsup'] ? '1' : null;
        $request['notify_telegram'] = $request['notify_telegram'] ? '1' : null;
        $request['password'] = Hash::make($request['password']);
        $request['name'] = ($request['name']) ?: $request['login'];

        $user->fill($request->all());
        $user->save();
        $user->board()->create([
            'name' => 'Моя страница',
            'active' => 1,
            'slug' => 'qr-' . rand(1000, 9999) . $user->id . Str::lower(Str::random(5)),
            'user_id' => $user->id
        ]);

        // добил роль
        $user->assignRole('user');


        if ($request->redirect == 'apply') {
            return redirect()->route('user.edit', $user->id)->with('success', 'Сохранено');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('user.index')->with('success', 'Сохранено');
        } elseif ($request->redirect == 'saveadd') {
            return redirect()->route('user.create')->with('success', 'Сохранено');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/admin/", 'name' => "Главная"],
            ['link' => "/admin/user", 'name' => "Пользователи"],
            ['name' => " Новый пользователь"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $user = new User();
        return view('backend.pages.user.edit', compact('breadcrumbs', 'user'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $breadcrumbs = [
            ['link' => "/admin/", 'name' => "Главная"],
            ['link' => "/admin/user", 'name' => "Пользователи"],
            ['name' => " Изменить пользователь"]
        ];

        return view('backend.pages.user.edit', compact('user', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->redirect == 'cancel') {
            return redirect()->route('user.index');
        }
        if ($request->redirect == 'delete') {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Пользователь ' . $user->email . ' удален');
        }


        $user->notify_doc = $request->boolean('notify_doc');
        $user->notify_vst = $request->boolean('notify_vst');
        $user->notify_edit = $request->boolean('notify_edit');
        $user->save();
        $user->fill($request->all());
        $user->save();

        if ($request->redirect == 'apply') {
            return redirect()->back()->with('success', 'Сохранено');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

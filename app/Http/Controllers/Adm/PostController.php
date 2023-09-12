<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortBy('id');;

        $breadcrumbs = [
            ['link' => "/admin/", 'name' => "Главная"],
            ['name' => " Статьи "]
        ];
        return view('backend.pages.post.index2', compact('posts', 'breadcrumbs'));
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
            ['link' => "/admin/post", 'name' => "Статьи"],
            ['name' => " Создать"]
        ];
        // создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что-то отправить.
        $post = new Post();

        $tags = Tag::where('active', 1)->orderByDesc('hits')->get();
        $sTags = $post->tags->pluck('id')->toArray();

        return view('backend.pages.post.edit',
            compact(
                'breadcrumbs',
                'post',
                'tags',
                'sTags')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ], [
            'name.required' => 'Название должно быть заполнено!',
            'name.min' => 'Минимальная длина поля 3 символа!',
        ]);
        $post = new Post();

        $post->pub = $request->boolean('pub');
        $post->notify = $request->boolean('notify');
        $post->in_main = $request->boolean('in_main');

        $post->fill($request->all())->save();
        $post->save();

        if ($request->redirect == 'apply') {
            return redirect()->route('post.edit', $post->id)->with('success', 'Сохранено.');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('post.index')->with('success', 'Сохранено.');
        }
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
    public function edit(Post $post, Request $request)
    {
        $breadcrumbs = [
            ['link' => "/admin/", 'name' => "Главная"],
            ['link' => "/admin/post", 'name' => "Статьи"],
            ['name' => " Редактирование"]
        ];

        $tags = Tag::where('active', 1)->orderByDesc('hits')->get();
        $sTags = $post->tags->pluck('id')->toArray();



        return view('backend.pages.post.edit', compact(
            'post',
            'tags',
            'sTags',
            'breadcrumbs'

        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|min:3'
        ], [
            'name.required' => 'Название должно быть заполнено!',
            'name.min' => 'Минимальная длина поля 3 символа!',
        ]);

        $post->pub = $request->boolean('pub');
        $post->notify = $request->boolean('notify');
        $post->in_main = $request->boolean('in_main');

        //dd($request->tags);
        $post->fill($request->all())->save();


        $post->save();
        $post->tags()->sync($request->tags);


        if ($request->redirect == 'apply') {
            return redirect()->back()->with('success', 'Сохранено.');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('post.index')->with('success', 'Сохранено.');
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

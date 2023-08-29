<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all()->sortBy('id');

        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Теги "]
        ];
        return view('backend.pages.tag.index', compact('tags', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/tag", 'name' => "Теги"],
            ['name' => " Новый "]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $tag = new Tag();
        $docs = $tag->docs()->get();
        $posts = $tag->posts()->get();
        return view('backend.pages.tag.edit', compact('breadcrumbs', 'tag', 'docs', 'posts'));
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
            'name' => 'required|min:3',
            'slug' => 'nullable|min:3|unique:tags',

        ], [
            'name.required' => 'Название должно быть заполнено!',
            'name.min' => 'Минимальная длина поля 3 символа!',
            'slug.unique' => 'неуникальна !',
        ]);
        $tag = new Tag();
        $tag->active = $request->boolean('active');
        $tag->name = $request->name;
        if (empty($request->slug)) {
            $tag->slug = Str::slug($request->name, '-');
        } else {
            $tag->slug = $request->slug;
        }

        $tag->save();

        //dd($request->tags);
        //$tag->fill($request->all())->save();


        if ($request->redirect == 'apply') {
            return redirect()->route('tag.edit', $tag->id)->with('success', 'Сохранено');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('tag.index')->with('success', 'Сохранено');
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
    public function edit(Tag $tag, Request $request)
    {

        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/tag", 'name' => "Теги"],
            ['name' => " Редактирование"]
        ];
        $docs = $tag->docs()->get();
        $posts = $tag->posts()->get();


        return view('backend.pages.tag.edit', compact(
            'tag',
            'breadcrumbs',
            'docs',
            'posts'

        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        if ($request->redirect == 'delete') {
            $tag->delete();
            return redirect()->route('tag.index')->with('success', 'Тег  ' . $tag->name . ' удален');
        }
        $request->validate([
            'name' => 'required|min:3',
            //   'slug' => 'required|min:3',
            'slug' => ['required', Rule::unique('tags')->ignore($tag->id),
            ],
        ], [
            'name.required' => 'Название должно быть заполнено!',
            'name.min' => 'Минимальная длина поля 3 символа!',
            'slug.unique' => 'неуникальна !',
        ]);

        $tag->active = $request->boolean('active');
        $tag->save();

        //dd($request->tags);
        $tag->fill($request->all())->save();


        if ($request->redirect == 'apply') {
            return redirect()->back()->with('success', 'Сохранено.');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('tag.index')->with('success', 'Сохранено.');
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

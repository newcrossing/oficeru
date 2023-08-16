<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Document as Doc;
use App\Models\Document;

use App\Models\Izm;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DocController extends Controller
{
    /**
     * Список документов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Doc::all()->sortBy('id');;

        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Документы"]
        ];
        return view('backend.pages.doc.index', compact('docs', 'breadcrumbs'));
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
            ['link' => "/admin/doc", 'name' => "Документы"],
            ['name' => " Создать"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $doc = new Doc();

        $tags = Tag::where('active', 1)->orderByDesc('hits')->get();
        $sTags = $doc->tags->pluck('id')->toArray();


        // коректная версия пока равна первой версии
        $curText = $doc->text;

        return view('backend.pages.doc.edit', compact(
            'breadcrumbs',
            'doc',
            'tags',
            'sTags',
            'curText'));
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
        $doc = new Doc();

        $doc->pub = $request->boolean('pub');
        $doc->notify = $request->boolean('notify');
        $doc->in_main = $request->boolean('in_main');

        $doc->fill($request->all())->save();

        $doc->save();
        $doc->tags()->sync($request->tags);

        if ($request->redirect == 'apply') {
            return redirect()->route('doc.edit', $doc->id)->with('success', 'Сохранено.');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('doc.index')->with('success', 'Сохранено.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Doc $doc
     * @return \Illuminate\Http\Response
     */
    public function show(Doc $doc)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Doc $doc
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Document $doc, Request $request)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/doc", 'name' => "Документы"],
            ['name' => " Редактирование"]
        ];


        $tags = Tag::where('active', 1)->orderByDesc('hits')->get();

        $sTags = $doc->tags->pluck('id')->toArray();


        // корректная версия документа
        $curVersion = 0;
        // выбраная версия документа
        $selVersion = ($request->izm) ?: 0;
        // текст для отображения, в завистмости от корректной версии или выбраных изменеий
        $curText = $doc->text;


        // получаю редакции документа и сортирую по дате вступления
        $edition = Izm::where('document_current_id', $doc->id)->select('izms.*')
            ->join('documents', 'documents.id', '=', 'izms.document_id')
            ->orderByDesc('documents.date_vst')
            ->orderByDesc('izms.id')
            ->get();

        // если есть редакции , ищем корректную версию
        $query = Izm::where('document_current_id', $doc->id)
            ->select('izms.*')
            ->join('documents', 'documents.id', '=', 'izms.document_id')
            ->orderByDesc('documents.date_vst')
            ->orderByDesc('izms.id')
            ->where('documents.date_vst', '<=', date('Y-m-d'))
            ->first();
        if ($query) {
            $curVersion = $query->id;
            $curText = $query->text;
            $selVersion = (!isset($request->izm)) ? $curVersion : $selVersion;
        }

        if (isset($request->izm) && $request->izm != $curVersion) {
            //Log::info($request->izm);
            if ($request->izm == '0') {
                $curText = $doc->text;
            } else {
                $izmVer = Izm::find($request->izm);
                $curText = $izmVer->text;
                $request->session()->now('message', 'Просматриваете не актуальную версию!');
            }
        }

        // Вносит изменения
        $toEdition = Izm::where('document_id', $doc->id)->get();
        $idIzm = $toEdition->pluck('document_current_id');
        $toEdition = Doc::whereIn('id', $idIzm)->get();


        return view('backend.pages.doc.edit', compact('doc', 'breadcrumbs',
            'edition',
            'curText',
            'tags',
            'sTags',
            'selVersion',
            'toEdition',
            'curVersion'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Doc $doc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doc $doc)
    {
        $curText = $request->text;;
        $request->validate([
            'name' => 'required|min:3'
        ], [
            'name.required' => 'Название должно быть заполнено!',
            'name.min' => 'Минимальная длина поля 3 символа!',
        ]);

        $doc->pub = $request->boolean('pub');
        $doc->notify = $request->boolean('notify');
        $doc->in_main = $request->boolean('in_main');

        $doc->fill($request->all())->save();

        if ($request->boolean('delete_a')) {
            $curText = preg_replace('/(?:\<a[^>]+\>\<span[^>]+\>)([^<]+)(?:\<\/span\>\<\/a\>)/i', '\\1', $curText);
        }
        if ($request->boolean('delete_consultant')) {
            $curText = preg_replace('/<div[^>]*>\s*?\((?:абзац введен|в ред\.|стать|часть|абзац|введена|сноска в|введен|пп\.|п\. [0-9\.]+ в ред\.|п\. [0-9\.]+ введен) .+?[0-9З]\)\s*?<\/div>/is', '', $curText);
            //$curText = preg_replace('/(<div[^>]*>\s*?\((?:абзац введен|в ред\.|стать|часть|введена|введен|пп\.|п\. [0-9\.]+ в ред\.|п\. [0-9\.]+ введен|п) .+?\))\s*?<\/div>/is', '', $curText);
            // $curText = preg_replace('/\s?-\s?Федеральный закон от (?:[^\.]*\.){2}.*?[\.;]/si', "", $curText);;
            $curText = str_replace('margin-top:12.0pt;', "", $curText);
            $curText = str_replace('margin-top:15.0pt;', "", $curText);
            //$curText = str_replace('text-indent:27.0pt', "", $curText);
            //  $curText = str_replace('margin-top: 12pt;', "", $curText);
            //$curText = preg_replace('/(<div[^>]*>\s*?\((п|стать|пп|част|в ред).*[0-9ФЗ]\)\s*?<\/div>)/is', "", $curText);;
             $curText = preg_replace('/(?:<div>[\s\S]*?<\/div>)?<table[^>]*>[\s\S]*?(?:КонсультантПлюс|Список изменяющих документов)[\s\S]*?<\/table>/si', "", $curText);;
        }



        if ($request->boolean('delete_probel')) {
            $curText = str_replace('&nbsp;', ' ', $curText);
            $curText = preg_replace("/  +/", " ", $curText);
        }

        if (empty($request->id_for_save)) {
            $doc->text = $curText;
            $doc->save();
        } else {
            $izm = Izm::find($request->id_for_save);
            $izm->text = $curText;
            $izm->save();
        }
        $doc->tags()->sync($request->tags);

        if ($request->redirect == 'apply') {
            return redirect()->back()->with('success', 'Сохранено.');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('doc.index')->with('success', 'Сохранено.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Doc $doc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doc $doc)
    {
//
    }

    public function list_table($id, Request $request)
    {
        $doc = Doc::find($id);
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/doc", 'name' => "Документы"],
            ['name' => " Редактирование"]
        ];
        $docs = Doc::all();

        if ($request->del) {
            $i = Izm::where('document_id', $id)->where('document_current_id', $request->del)->delete();


        }

        // Вносит изменения
        $toEdition = Izm::where('document_id', $doc->id)->get();
        $idIzm = $toEdition->pluck('document_current_id');
        $toEdition = Doc::whereIn('id', $idIzm)->get();


        return view('backend.pages.doc.izm', compact('doc', 'docs', 'toEdition'));
    }

    public function list_table_update($id, Request $request)
    {
        //  dd($request->chek);
        // если нащелкали чекбоксы
        if ($request->chek) {
            foreach ($request->chek as $key => $value) {
                $i = new Izm();
                $i->document_id = $id;
                $i->document_current_id = $value;
                $i->save();
            }

        }
        return redirect()->back()->with('success', 'Сохранено.');
    }


}

<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Document as Doc;
use App\Models\Post;
use App\Models\Izm;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $docs = Doc::all();

        return view('backend.pages.doc.edit', compact('breadcrumbs', 'doc', 'docs'));
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Doc $doc,Request $request)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/doc", 'name' => "Документы"],
            ['name' => " Редактирование"]
        ];

        $users = \Auth::user();
        $docs = Doc::select('id', 'preamble_name', 'nomer', 'short_name', 'name', 'date_pod')->get()->sortBy('id');;
        // список  документов которые вносят изменения в текущий
//       $izms = Izm::where('document_current_id', $doc->id)->orderBy('id', 'desc')->get();
//         //$izms = Izm::with('document')->where('document_current_id', $doc->id)->get()->sortBy('date_vst');
//
//        $izms = $izms->load(['document' => function ($query) {
//            $query->orderBy('id', 'desc');
//        }]);
//
//
//        $izms = Izm::where('document_current_id', $doc->id)->orderByDesc(Doc::select('date_vst')
//            ->whereColumn('documents.id', 'izms.document_id')
//        )->get();


        $izms = Izm::where('document_current_id', $doc->id)->select('izms.*')
            ->join('documents', 'documents.id', '=', 'izms.document_id')
            ->orderByDesc('documents.date_vst')
            ->orderByDesc('izms.id')
            ->get();

//dd($posts);




        // оставляю только текущие для поиска id  документов
       // $idIzm = $izms->pluck('document_id');
        // ищу документы вноясщие в документ
      //  $izms = Doc::whereIn('id', $idIzm)->orderBy('date_vst', 'desc')->orderBy('id', 'desc')->get();
        //dd($docIzm);
        //$docIzm = Doc::find()

        return view('backend.pages.doc.edit', compact('doc', 'users', 'docs', 'breadcrumbs', 'izms'));
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

        if ($request->boolean('delete_consultant')) {
            $doc->text = preg_replace('/(<div[^>]*>\s*?\((?:абзац введен|в ред\.|введена|введен|пп\. .{3}+ в ред\.|п\. [0-9\.]+ в ред\.|п\. [0-9\.]+ введен) .+?\))\s*?<\/div>/si',
                '', $doc->text);
            $doc->text = preg_replace('/\s?-\s?Федеральный закон от (?:[^\.]*\.){2}.*?[\.;]/si', "", $doc->text);;
        }

        if ($request->boolean('delete_a')) {
            $doc->text = preg_replace('/(?:\<a[^>]+\>\<span[^>]+\>)([^<]+)(?:\<\/span\>\<\/a\>)/i', '\\1', $doc->text);
        }

        if ($request->boolean('delete_probel')) {
            $doc->text = str_replace('&nbsp;', ' ', $doc->text);
            $doc->text = preg_replace("/  +/", " ", $doc->text);
        }

        $doc->save();

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
}

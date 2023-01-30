<?php

namespace App\Http\Controllers;

use App\Models\Document as Doc;
use App\Models\Tag;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $users = DB::table('content')->where('Id_Content', '129')->first();
        return view('main.index', ['users' => $users]);
    }

    public function listing()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Документы"],
        ];

        $docs = Doc::where('pub', '1')->orderBy('id', 'desc')->paginate(15);

        $tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();


        return view('front.doc.list', compact('docs', 'tags', 'breadcrumbs'));
    }

    public function single($id)
    {
        $doc = Doc::findOrFail($id);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/doc", 'name' => " Документы "],
            ['name' => $doc->name],
        ];

        if (empty($doc->date_pod)) {
            $messageTop = "Документ не подписан";
        } elseif ($doc->date_pod > date('Y-m-d') || empty($doc->date_pub)) {
            $messageTop = "Документ не опубликован";
        } elseif (empty($doc->date_vst)) {
            $messageTop = "Документ не вступил в силу";
        } elseif ($doc->date_vst > date('Y-m-d')) {
            $messageTop = sprintf('Документ вступает в силу %s г.',
                \Carbon\Carbon::parse($doc->date_vst)->isoFormat('Do MMMM YYYY'));
        } elseif (strtotime($doc->date_end_vst) <= strtotime(date('Y-m-d')) && $doc->date_end_vst) {
            $messageTop = sprintf('Документ утратил силу %s г.',
                \Carbon\Carbon::parse($doc->date_end_vst)->isoFormat('Do MMMM YYYY'));
        } else {
            $messageTop = null;
        }

        //$tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();


        return view(
            'front.doc.index',
            [
                'doc' => $doc,
                'messageTop' => $messageTop,
                'breadcrumbs' => $breadcrumbs
            ]
        );
    }
}

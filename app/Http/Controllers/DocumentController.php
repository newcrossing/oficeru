<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use App\Models\Document as Doc;
use App\Models\Izm;
use App\Models\Tag;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function listing()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Документы "],
        ];

        $docs = Doc::where('pub', '1')->orderBy('id', 'desc')->paginate(15);
        $tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();
        return view('frontend.doc.list', compact('docs', 'tags', 'breadcrumbs'));
    }

    public function search(Request $request)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Поиск"],
            ['name' => $request->s],
        ];

        $arrFind = [];
        $text = $request->s;
        $config = ['host' => '127.0.0.1', 'port' => 9308];
        $client = new \Manticoresearch\Client($config);
        $index = $client->index('indexname');
        // $docs = $index->search($text)->get();
        $docs = $index->search($text)->highlight(
            ['name', 'text'],
            // ['limit'=>200],
            //['snippet_separator'=>'..'],
            //   ['pre_tags'=>'before_','post_tags'=>'_after']
            ['number_of_fragments' => 10],
            ['limits_per_field' => 20]
        )->get();
        foreach ($docs as $doc) {
            $arrFind[] = $doc->getId();
        }

        Activity::add('Поисковый запрос: ' . $text, Activity::INFO);

        //$docs = Doc::whereIn('id', $arrFind)->paginate(30);

        return view('frontend.doc.list_search', compact('docs', 'breadcrumbs'));
    }

    public function index()
    {
        $users = DB::table('content')->where('Id_Content', '129')->first();
        return view('main.index', ['users' => $users]);
    }

    public function single($id)
    {
        $messageTop = null;
        $doc = Doc::where('pub', 1)->findOrFail($id);
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/doc", 'name' => " Документы "],
//            ['name' => $doc->getShotName()],
        ];

        // текст для отображения, в завистмости от корректной версии или выбраных изменеий
        $curText = $doc->text;

        $query = Izm::where('document_current_id', $doc->id)
            ->select('izms.*')
            ->join('documents', 'documents.id', '=', 'izms.document_id')
            ->orderByDesc('documents.date_vst')
            ->orderByDesc('izms.id')
            ->where('documents.date_vst', '<=', date('Y-m-d'))
            ->first();

        // имеется действующая редакция
        if ($query) {
            // если нет еще новой версии текста
            if (empty($query->text)) {
                $messageTop = "В документ внесены изменения. Новая редакция в скором времени будет опубликована.<a href='/doc/" . $query->document->id . "'> Источник</a>";
                Activity::add($messageTop, 'error');
            } else {
                $curText = $query->text;
            }

        } else {
            // если нет изменений
            if (empty($doc->date_pod)) {
                $messageTop = "Документ не подписан";
            } elseif (empty($doc->date_pub) || $doc->date_pub->format('Y-m-d') > date('Y-m-d')) {
                $messageTop = "Документ не опубликован" . $doc->date_pub;
            } elseif (empty($doc->date_vst)) {
                $messageTop = "Документ не вступил в силу";
            } elseif ($doc->date_vst->format('Y-m-d') > date('Y-m-d')) {
                $messageTop = sprintf('Документ вступает в силу %s г.',
                    \Carbon\Carbon::parse($doc->date_vst)->isoFormat('Do MMMM YYYY'));
            } elseif (strtotime($doc->date_end_vst) <= strtotime(date('Y-m-d')) && $doc->date_end_vst) {
                $messageTop = sprintf('Документ утратил силу %s г.',
                    \Carbon\Carbon::parse($doc->date_end_vst)->isoFormat('Do MMMM YYYY'));
            } else {
                $messageTop = null;
            }
        }


        //$tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();


        return view(
            'frontend.doc.index',
            [
                'doc' => $doc,
                'messageTop' => $messageTop,
                'curText' => $curText,
                'breadcrumbs' => $breadcrumbs
            ]
        );
    }
}

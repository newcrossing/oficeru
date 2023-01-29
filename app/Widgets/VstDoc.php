<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Document;

class VstDoc extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $docs = Document::whereNotNull('date_vst')->orderByDesc('date_vst')->limit(5)->get();
        return view('front.widgets.vst_doc', compact('docs'));
    }
}

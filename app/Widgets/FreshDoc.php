<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Document;

class FreshDoc extends AbstractWidget
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
        $docs = Document::whereNotNull('date_pub')->orderByDesc('date_pub')->limit(5)->get();
        return view('front.widgets.fresh_doc', compact('docs'));
    }
}

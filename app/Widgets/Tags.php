<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Tag;

class Tags extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $tag = Tag::all();

        return view('front.widgets.tags', [
            'config' => $this->config,
            'tag' => $tag,
        ]);
    }
}

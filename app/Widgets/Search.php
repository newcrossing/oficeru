<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Search extends AbstractWidget
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

        return view('frontend.widgets.search', [
            'config' => $this->config,
        ]);
    }
}

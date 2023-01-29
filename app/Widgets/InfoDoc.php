<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class InfoDoc extends AbstractWidget
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
        //
        $doc = (object)$this->config;
        //$docs = $this->config;
        return view('front.widgets.info_doc', compact('doc'));
    }
}

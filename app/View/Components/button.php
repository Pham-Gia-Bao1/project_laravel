<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $content;
    public $link;
    public $border_radius;
    public $bg_color;

    public function __construct($content = "checkout", $link="checkout", $border_radius="rounded", $bg_color="btn--primary")
    {
        //
        $this->content = $content;
        $this->link = $link;
        $this->border_radius = $border_radius;
        $this->bg_color = $bg_color;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}

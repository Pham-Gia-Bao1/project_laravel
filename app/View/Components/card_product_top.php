<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_product_top extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id,$img,$title,$price;
    public function __construct($img, $title, $price,$id=1)
    {
        $this->id=$id;
        $this->img = $img;
        $this->title = $title;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_product_top');
    }
}

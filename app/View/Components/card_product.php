<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id; // Add the id property
    public $title;
    public $img;
    public $price;
    public $rating;

    public function __construct($id = 1, $title, $img, $price, $rating)
    {
        $this->id = $id;
        $this->title = $title;
        $this->img = $img;
        $this->price = $price;
        $this->rating = $rating;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_product');
    }
}

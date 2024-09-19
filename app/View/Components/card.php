<?php
namespace App\View\Components;

use Illuminate\View\Component;

class card extends Component
{
    public $name;
    public $price;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $price
     * @return void
     */
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}

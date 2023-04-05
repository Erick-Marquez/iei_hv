<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectScore extends Component
{
    public $name;
    public $score;
    public $disabled;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $score, $disabled = '')
    {
        $this->name = $name;
        $this->score = $score;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-score');
    }
}

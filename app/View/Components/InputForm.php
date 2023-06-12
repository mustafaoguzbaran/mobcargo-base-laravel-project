<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputForm extends Component
{
    /**
     * Create a new component instance.
     */
    public const TYPES = array("text", "checkbox", "submit", "password", "number", "image", "email", "date");
    public function __construct(public string $type, public string $name)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if(in_array($this->type,self::TYPES)){
            return view('components.input-form');
        }else{
            return "";
        }

    }
}

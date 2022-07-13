<?php

namespace App\Http\Livewire;

use Illuminate\View\Component as ViewComponent;
use Livewire\Component;


class Counter extends ViewComponent
{
    public function render()
    {
        return view('livewire.counter');
    }
}

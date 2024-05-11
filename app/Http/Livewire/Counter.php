<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 5;
    public function increase(){
        $this->count++;
    }
    
    public function render()
    {
        return view('livewire.counter');
    }
}
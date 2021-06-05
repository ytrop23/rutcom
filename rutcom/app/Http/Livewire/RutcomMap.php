<?php

namespace App\Http\Livewire;
use Mapper;
use Livewire\Component;

class RutcomMap extends Component
{
    public function render()
    {   Mapper::map(37.02700, -4.53864);
        return view('livewire.rutcom-map');
    }
}

<?php

namespace App\Http\Livewire;
use Mapper;
use Livewire\Component;
use App\Models\Location;

class ClientsMap extends Component
{
    public $location;

    public function render()
    {   $location=Location::all();

        Mapper::map(0, 0);

        foreach ($location as $value) {
            Mapper::marker($value->latitude, $value->longitude);
                 }

        return view('livewire.clients-map');
    }
}

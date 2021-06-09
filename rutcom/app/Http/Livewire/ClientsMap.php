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

        Mapper::map(37.02700, -4.53864);

        foreach ($location as $value) {
            Mapper::informationWindow($value->latitude, $value->longitude,$value->content);
                 }

        return view('livewire.clients-map');
    }
}

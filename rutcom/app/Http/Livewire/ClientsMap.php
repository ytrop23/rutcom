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
Mapper::informationWindow(53.381128999999990000, -1.470085000000040000, 'Content');
        return view('livewire.clients-map');
    }
}

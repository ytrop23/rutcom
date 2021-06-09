<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\Location;
use App\Models\Client;

class CreateLocationForm extends Component
{
    public $state;
    public function createlocation()
	{
		Validator::make(
			$this->state,
			[
				'user_id' =>  'requiered',
				'latitude' => 'required',
				'longitude' => 'required',
				'content' => 'nullable',

			])->validate();


		Location::create($this->state);

		$this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully',
            'text' => '',
        ]);
	}

    public function render()

    {   $clients = Client::all();

        return view('livewire.create-location-form', [
        	'clients' => $clients,

            ]);
    }

}

<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use App\Models\Appointment;
use App\Models\Client;
use Livewire\Component;


class CreateAppointmentForm extends Component
{
	public $state = [
		'status' => 'SCHEDULED',
	];

	public function createAppointment()
	{
		Validator::make(
			$this->state,
			[
				'client_id' => 'required',
				'date' => 'required',
				'time' => 'required',
				'note' => 'nullable',
				'status' => 'required|in:SCHEDULED,CLOSED',
			],
			[
				'client_id.required' => 'The client field is required.'
			])->validate();

		Appointment::create($this->state);

		$this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully',
            'text' => '',
        ]);
	}

    public function render()
    {   $clients = Client::all();
        return view('livewire.create-appointment-form', [
        	'clients' => $clients,
        ]);
    }
}

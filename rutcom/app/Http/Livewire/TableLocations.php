<?php

namespace App\Http\Livewire;


use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;


class TableLocations extends Component
{

    use WithPagination;

    public $showModal = false;
    public $locationid;
    public $location;

    protected $rules = [
        'location.client_id' => 'required',
        'location.longitude'=>'required',
        'location.latitude'=>'required',
        'location.content'=>'required',


    ];
    protected $queryString = [
        'search' => ['except'=>''],
        'perPage' => ['except'=>'5'],

    ];

    public $search= '';
    public $perPage='5';



    public function render(){

            return view('livewire.location',[
            'locations' => Location::where('latitude','LIKE',"%{$this->search}%")
            ->orWhere('longitude','LIKE',"%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }




    public function clear() {
        $this->search = '';
        $this->page = 1;
        $this->perPage= '5';
    }

    public function edit($locationid)
    {
        $this->showModal = true;
        $this->locationid= $locationid;
        $this->location = Location::find($locationid);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record updated successfully',
            'text' => '',
        ]);
    }

    public function create()
    {
        $this->showModal = true;
        $this->location = null;
        $this->locationid= null;
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully',
            'text' => '',
        ]);
    }

    public function save()
    {
        $this->validate();

        if (!is_null($this->locationid)) {
            $this->location->save();
        } else {
            Location::create($this->location);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($id)
    {
        $location = Location::find($id);
        if ($location) {
            $location->delete();
        }
    }
}





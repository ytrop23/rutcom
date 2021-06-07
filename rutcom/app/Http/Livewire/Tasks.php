<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;

class Tasks extends Component
{   use WithPagination;

    public $showModal = false;
    public $eventid;
    public $event;

    protected $rules = [

        'event.title' => 'required',
        'event.start' => 'required',
        'event.status' => 'required',




    ];

    protected $queryString = [
        'search' => ['except'=>''],
        'perPage' => ['except'=>'5'],

    ];

    public $search= '';
    public $perPage='5';



    public function clear() {
        $this->search = '';
        $this->page = 1;
        $this->perPage= '5';
    }

    public function edit($eventid){
        $this->showModal = true;
        $this->eventid= $eventid;
        $this->event = Event::find($eventid);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record updated successfully',
            'text' => '',
        ]);
    }

    public function create(){
        $this->showModal = true;
        $this->event = null;
        $this->eventid= null;
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully',
            'text' => '',
        ]);
    }

    public function save(){
        $this->validate();

        if (!is_null($this->eventid)) {
            $this->event->save();
        } else {
            event::create($this->event);
        }
        $this->showModal = false;
    }

    public function close(){
        $this->showModal = false;
    }

    public function delete($id){
        $event = Event::find($id);
        if ($event) {
            $event->delete();
        }
    }
    public function render()
    {
        return view('livewire.tasks',[
            'events' => Event::where('title','LIKE',"%{$this->search}%")
            ->orWhere('start','LIKE',"%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }
}

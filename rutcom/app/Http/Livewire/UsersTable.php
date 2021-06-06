<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UsersTable extends Component
{
    use WithPagination;

    public $showModal = false;
    public $userid;
    public $user;

    protected $rules = [
        'user.role_id' => 'required',
        'user.status'=>'required',

    ];
    protected $queryString = [
        'search' => ['except'=>''],
        'perPage' => ['except'=>'5'],

    ];

    public $search= '';
    public $perPage='5';



    public function render()

    {
        $role=Auth::user()->role_id;
        if($role =='1'){
            return view('livewire.users-table',[
            'users' => User::where('name','LIKE',"%{$this->search}%")
            ->orWhere('email','LIKE',"%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }

    else{
        return  abort(403);
    }
}

    public function clear() {
        $this->search = '';
        $this->page = 1;
        $this->perPage= '5';
    }

    public function edit($userid)
    {
        $this->showModal = true;
        $this->userid= $userid;
        $this->user = User::find($userid);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record updated successfully',
            'text' => '',
        ]);
    }

    public function create()
    {
        $this->showModal = true;
        $this->user = null;
        $this->userid= null;
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully',
            'text' => '',
        ]);
    }

    public function save()
    {
        $this->validate();

        if (!is_null($this->userid)) {
            $this->user->save();
        } else {
            User::create($this->user);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
    }
}




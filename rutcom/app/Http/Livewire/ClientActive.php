<?php

namespace App\Http\Livewire;
use App\Models\Client;
    use Livewire\WithPagination;
    use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ClientActive extends Component
{



          use WithPagination;

            public $showModal = false;
            public $clientid;
            public $client;

            protected $rules = [
                'client.role_id' => 'required',
                'client.status'=>'required',

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
                    return view('livewire.client-active',[
                    'clients' => Client::where('name','LIKE',"%{$this->search}%")
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

            public function edit($clientid)
            {
                $this->showModal = true;
                $this->clientid= $clientid;
                $this->client = Client::find($clientid);
            }

            public function create()
            {
                $this->showModal = true;
                $this->client = null;
                $this->clientid= null;
            }

            public function save()
            {
                $this->validate();

                if (!is_null($this->clientid)) {
                    $this->client->save();
                } else {
                    Client::create($this->client);
                }
                $this->showModal = false;
            }

            public function close()
            {
                $this->showModal = false;
            }

            public function delete($id)
            {
                $client = Client::find($id);
                if ($client) {
                    $client->delete();
                }
            }

}

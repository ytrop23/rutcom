<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use App\Exports\ClientExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ClientsExcel extends Component
{

    public $selectedClients = [];

    public $clients;



    public function mount()
    {
        $this->clients = Client::all();
    }



    public function export($ext)
    {
        abort_if(!in_array($ext, ['csv', 'xlsx', 'pdf']), Response::HTTP_NOT_FOUND);

        return Excel::download(new ClientExport($this->selectedClients), 'clients.' . $ext);
    }

    public function render(){
    $role=Auth::user()->role_id;
    if($role =='1'){
        return view('livewire.clients-excel');
        }
     else{
        return  abort(403);
    }
    }
}

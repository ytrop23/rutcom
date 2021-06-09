<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use App\Exports\ClientExport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

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

    public function render()
    {
        return view('livewire.clients-excel');
    }
}

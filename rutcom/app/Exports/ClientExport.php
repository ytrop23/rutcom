<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientExport implements FromCollection, WithHeadings, WithMapping
{

    private $clientIDs;

    public function __construct($clientIDs) {
        $this->clientIDs = $clientIDs;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Dni',
            'Address',
            'Active',
            'Email'
        ];
    }

    public function map($client): array
    {
        return [
            $client->name,
            $client->dni,
            $client->address,
            $client->active,
            $client->email,
        ];
    }


    public function collection()
    {
        return Client::all()->find($this->clientIDs);
    }



}

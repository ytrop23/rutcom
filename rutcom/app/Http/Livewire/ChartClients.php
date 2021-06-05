<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use App\Models\Client;
use DB;
use Livewire\Component;

class ChartClients extends Component
{
    public function render()
    { $populationClients = Client::select(
        DB::raw("year(created_at) as year"),
        DB::raw('count(*) as count'))

    ->orderBy(DB::raw("YEAR(created_at)"))
    ->groupBy(DB::raw("YEAR(created_at)"))
    ->get();


$res[] = ['Year', 'Clients'];
foreach ($populationClients as $key => $val) {
$res[++$key] = [$val->year, (int)$val->count];
}
        return view('livewire.chart-clients')->with('populationClients', json_encode($res));
    }
}

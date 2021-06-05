<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Livewire\Component;

class Chartline extends Component
{
    public function render()
    { $population = User::select(
        DB::raw("year(created_at) as year"),
        DB::raw('count(*) as count'))

    ->orderBy(DB::raw("YEAR(created_at)"))
    ->groupBy(DB::raw("YEAR(created_at)"))
    ->get();


$res[] = ['Year', 'Users'];
foreach ($population as $key => $val) {
$res[++$key] = [$val->year, (int)$val->count];
}
        return view('livewire.chartline')->with('population', json_encode($res));
    }
}

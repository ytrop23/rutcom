<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ChartController extends Controller
{
    public function showChart()
    {
        $population = User::select(
                        DB::raw("year(created_at) as year"),
                        DB::raw('count(*) as count'))

                    ->orderBy(DB::raw("YEAR(created_at)"))
                    ->groupBy(DB::raw("YEAR(created_at)"))
                    ->get();


        $res[] = ['Year', 'users'];
        foreach ($population as $key => $val) {
            $res[++$key] = [$val->year, (int)$val->count];
        }

        return view('line-chart')
            ->with('population', json_encode($res));
    }
}

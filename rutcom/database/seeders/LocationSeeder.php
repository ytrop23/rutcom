<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'client_id' => '1',
            'latitude' => '40.96492646372465',
            'longitude' => '-5.664112811746819',
            'content'=>'Salamanca'
        ]);
    }
}

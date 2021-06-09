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
            'latitude' => '19.2675991',
            'longitude' => '-103.7132034',
        ]);
    }
}

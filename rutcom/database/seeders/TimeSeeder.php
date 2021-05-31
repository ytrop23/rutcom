<?php

namespace Database\Seeders;
use App\Models\Times;

use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Times::create([
            'user_id'=>'1',
            'started_at' => 'prueba',
            'stopped_at' => 'prueba',

        ]);

    }
}

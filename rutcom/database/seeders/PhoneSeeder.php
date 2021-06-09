<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Phone;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone::create([
            'client_id' => '1',
            'phone' => '957514468',
            ]);
    }

}

<?php

namespace Database\Seeders;
use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name' => 'SuperAdmin',
            'dni' => '82828282S',
            'email' => 'proof@gmail.com',
            'active' => true,
            'address' => 'Calle El Peso 10 1400 Lucena Cordoba',
            'description' => 'Proof',
            'latitude' => null,
            'longitude' => null
        ]);


    }
}

<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name'=>$this=>faker->name,
        'Dni/Cif'=>$this=>faker->dni,
        'email'=>$this=>faker->email,
        'active'=>$this=>faker->active,
        'address'=>$this=>faker->adress,
        'description'=>$this=>faker->description,
        'latitude'=>$this=>faker->latitude,
        'longitude'=>$this=>faker->longitude,

        ];
    }
}

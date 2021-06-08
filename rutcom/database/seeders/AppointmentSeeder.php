<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appointment::create([
            'user_id'=>1,
            'client_id' => 1,
            'date' =>  Carbon::parse('2000-01-01'),
            'time' => Carbon::parse('11:00'),
            'status'=>'SCHEDULED',
                 'note' => null

                 ]);
     }
    }

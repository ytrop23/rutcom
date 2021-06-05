<?php
use Illuminate\Http\Request;
namespace App\Http\Livewire;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\User;
use DB;
use Livewire\Component;

class AppointmentsCount extends Component
{

    public $appointmentsCount;
    public $clientsCount;
    public $usersCount;

    public function mount()
    {
        $this->getAppointmentsCount();
        $this->getClientsCount();
        $this->getUsersCount();
    }

    public function getAppointmentsCount($status = null)
    {
        $this->appointmentsCount = Appointment::query()
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->count();
    }

    public function getClientsCount($status = null)
    {
        $this->clientsCount = Client::query()
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->count();
    }
    public function getUsersCount($status = null)
    {
        $this->usersCount = User::query()
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->count();
    }






    public function render()
    {
        return view('livewire.appointments-count');
    }


}

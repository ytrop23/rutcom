<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'date',
        'time',
        'note',
        'status',

        ];


    public function client()
    {
    	return $this->belongsTo(Client::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }



    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDate();
    }

    public function getTimeAttribute($value)
    {
        return Carbon::parse($value)->toFormattedTime();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function getStatusBadgeAttribute()
    {
    	$badges = [
    		'Potential' => 'primary',
    		'VIP' => 'success',
    	];

    	return $badges[$this->status];
    }


    protected $fillable = [
        'name',
        'dni',
        'email',
        'active',
        'address',
        'description',
        'latitude',
        'longitude',

        ];


}

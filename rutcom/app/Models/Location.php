<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'latitude',
        'longitude',
        'content'

        ];

        public function client()
        {
            return $this->belongsTo(Client::class);
        }

}

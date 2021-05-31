<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Times extends Model
{
    use HasFactory;

    protected $fillable = [
        'started_at',
        'stopped_at',

    ];

    public static function createModel($datos, $id=null){
        if ($id!=null) {
            $newtimes=Times::find($id);
        }else{
            $newtimes= new Times;
        }
        $newtimes->id=$datos["times_id"];
        $newtimes->user_id = auth()->id();
        $newtimes->started_at=$datos['started_at'];
        $newtimes->stopped_at=$datos['stopped_at'];
        return $newtimes;
    }




}

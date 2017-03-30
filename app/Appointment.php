<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha','hora','patient_id','doctor_id', 'valor', 'estado',
    ];

     public function Doctor()
        {     return $this->belongsTo('App\Doctor');
        }

    public function Patient()
        {     return $this->belongsTo('App\Patient');
        }
}

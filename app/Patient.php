<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'documento','tipo_documento','nombres','apellidos', 'sexo', 'fecha_nacimiento', 'eps', 'telefono', 'direccion', 'nombres_acudiente', 'telefono_acudiente',
    ];

    public function appointments()
        {    return $this->hasMany('App\Appointment');
        }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $fillable = [
        'documento','tipo_documento','nombres','apellidos', 'celular', 'email', 'codigo', 'documento', 'especialidad',
    ];
}

}

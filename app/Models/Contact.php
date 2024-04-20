<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Contact extends Model
{
    use HasFactory;
    // se tiene que especificar los campos que se pueden llenar para que no se pueda inyectar codigo
    // esto se hace porque laravel es muy permisivo y si no se especifica se puede inyectar codigo
    // aparte de eso estamos usando un csrf token por lo que dara un error al no identificar el campo
    // csrf en la base de datos
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'age',
    ];
}

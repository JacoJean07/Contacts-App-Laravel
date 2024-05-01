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
        'user_id', // se agrega el campo user_id para que se pueda llenar
        'name',
        'phone_number',
        'email',
        'age',
    ];

    // definimos la relacion de un contacto con su usuario
    public function user()
    {
        // se tiene que especificar que un contacto pertenece a un usuario
        return $this->belongsTo(User::class);
        //ocupa el modelo de usuario y le une el _id automaticamente para buscar la foreign key
        // en este caso se busca la foreign key user_id en la tabla de contactos
    }
}

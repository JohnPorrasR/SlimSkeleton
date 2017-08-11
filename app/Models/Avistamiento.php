<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avistamiento extends Model
{

    protected $table = 'avistamientos';

    protected $fillable = ['titulo', 'pajaro', 'lastview', 'veces', 'latitud', 'longitud'];

}
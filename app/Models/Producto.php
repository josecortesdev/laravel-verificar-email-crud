<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

        //Relación uno a muchos (inversa)
        public function user(){ // En singular, ya que solo lo ha publicado un usuario
            return $this->belongsTo('app\Models\User');
        }

}

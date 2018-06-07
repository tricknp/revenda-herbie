<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    public function marcas(){
        return $this->belongsToMany('App\Marca', 'marcas_oficinas');
    }
}

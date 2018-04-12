<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carro extends Model
{

    public function marca(){
        return $this->belongsTo('App\Marca');
    }

    public function getModeloAttribute($value){
        return strtoupper('$value');
    }

    public function getCombustivelAttribute($value){
        if($value == 'A'){
            return 'Álcool';
        }else if($value == 'D'){
            return 'Diesel';
        }else if($value == 'F'){
            return 'Flex';
        }else if($value == 'G'){
            return 'Gasolina';
        }
    }

}

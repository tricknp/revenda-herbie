<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proposta extends Model
{
    private $meses = [
        'January' => 'blue',
        'February' => 'red',
        'March' => 'purple',
        'April' => 'white',
        'May' => 'black',
        'June' => 'orange',
        'July' => 'green',
        'August' => 'cyan',
        'September' => 'pink',
        'October' => 'black',
        'November' => 'brown',
        'December' => 'moss'
    ];

    protected $fillable = ['data', 'id_veiculo', 'email', 'nome', 'telefone', 
    'descricao_proposta'];

    public function getGraf(){
        $propostas = DB::table('propostas')
            ->groupBy(\DB::raw('MONTHNAME(created_at)'))
            ->select(\DB::raw('MONTHNAME(created_at) as mes, count(*) as quantidade'))    
            ->get()
            ->toArray();
        
        $resultados = [];
        foreach ($propostas as $proposta) {
            $cor = $this->meses[$proposta->mes];
            $resultados[] = [
                $proposta->mes,
                $proposta->quantidade,
                $cor
            ];
        }

        return json_encode($resultados);
    }
}

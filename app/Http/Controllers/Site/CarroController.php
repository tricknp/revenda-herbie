<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Carro;
use App\Marca;

class CarroController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index(){
        $carros = Carro::all();

        return view('site.carros_list', compact('carros'));
    }

    public function viewdestaque(){
        $carros = DB::table('carros')
            ->where('destaque', 1)->get();


        return view('site.index', ['carros' => $carros]);
    }

    public function pesquisar(Request $request){
        $s = $request->input('s');

        $modelos = Carro::latest()
            ->search($s)
            ->paginate(20);
            
        return view('site.pesquisa', compact('modelos', 's'));
    }

    public function propostaIndex($id){
        $carro = Carro::findOrFail($id);
        
        $marcaid = $carro->marca_id;

        $marca = Marca::findOrFail($marcaid);

        $nomemarca = $marca->nome;

        return view('site.proposta', compact('carro', 'nomemarca'));
    }
}

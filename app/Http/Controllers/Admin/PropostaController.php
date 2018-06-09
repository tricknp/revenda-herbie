<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\MailSend;
use App\Proposta;

class PropostaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propostas = Proposta::all();

        return view ('propostas_graf', compact('propostas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //metodo que envia o email
    //recebe os dados do form
    public function enviarEmail(Request $request){
        $email = $request->email;

        Mail::to('nporto.patrick@gmail.com')->send(new MailSend());
        return redirect ('/admin/carros');
    }

    public function respostaMail($id){
        $proposta = Proposta::findOrFail($id);
        return view('admin.mail.resposta', compact('proposta'));
    }

    public function graf(){
        $proposta = new Proposta();
        $propostas = $proposta->getGraf();

        return view('admin.propostas_graf', compact('propostas'));
    }
}

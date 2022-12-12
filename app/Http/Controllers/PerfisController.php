<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Perfil;
use App\Models\Log;

class PerfisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Perfil::orderBy('nome')->get();
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
        $data = new Perfil;

        $data->nome = $request->nome;   
        $data->administrador = $request->administrador;   
        $data->gestor = $request->gestor;   

        $data->created_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um Perfil';
            $log->table = 'perfis';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Perfil::find($id);
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
        $data = Perfil::find($id);
        $dataold = $data;

        $data->nome = $request->nome;   
        $data->administrador = $request->administrador;   
        $data->gestor = $request->gestor;   


        $data->updated_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Perfil';
            $log->table = 'perfis';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->object_old = $dataold;
            $log->save();
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Perfil::find($id);
         
        if($data->delete()){
           $log = new Log;
           $log->user_id = Auth::id();
           $log->mensagem = 'Excluiu um Perfil';
           $log->table = 'perfis';
           $log->action = 3;
           $log->fk = $data->id;
           $log->object = $data;
           $log->save();
           return 1;
         }else{
           return 2;
         }
    }
}

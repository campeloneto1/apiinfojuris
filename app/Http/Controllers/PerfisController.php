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

        $data->audiencias = $request->audiencias;  
        $data->audiencias_cad = $request->audiencias_cad;  
        $data->audiencias_edt = $request->audiencias_edt;  
        $data->audiencias_del = $request->audiencias_del;  

        $data->filiais = $request->filiais;  
        $data->filiais_cad = $request->filiais_cad;  
        $data->filiais_edt = $request->filiais_edt;  
        $data->filiais_del = $request->filiais_del; 

        $data->lancamentos = $request->lancamentos;  
        $data->lancamentos_cad = $request->lancamentos_cad;  
        $data->lancamentos_edt = $request->lancamentos_edt;  
        $data->lancamentos_del = $request->lancamentos_del; 

        $data->pessoas = $request->pessoas;  
        $data->pessoas_cad = $request->pessoas_cad;  
        $data->pessoas_edt = $request->pessoas_edt;  
        $data->pessoas_del = $request->pessoas_del; 

        $data->processos = $request->processos;  
        $data->processos_cad = $request->processos_cad;  
        $data->processos_edt = $request->processos_edt;  
        $data->processos_del = $request->processos_del; 

        $data->usuarios = $request->usuarios;  
        $data->usuarios_cad = $request->usuarios_cad;  
        $data->usuarios_edt = $request->usuarios_edt;  
        $data->usuarios_del = $request->usuarios_del; 

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
            return response()->json('Perfil cadastrado com sucesso!', 200);
        }else{
            $erro = "Não foi possivel realizar o cadastro!";
            $cod = 171;
            $resposta = ['erro' => $erro, 'cod' => $cod];
            return response()->json($resposta, 404);
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

        $data->nome = $request->nome;   
        $data->administrador = $request->administrador;   
        $data->gestor = $request->gestor;   

        $data->audiencias = $request->audiencias;  
        $data->audiencias_cad = $request->audiencias_cad;  
        $data->audiencias_edt = $request->audiencias_edt;  
        $data->audiencias_del = $request->audiencias_del;  

        $data->filiais = $request->filiais;  
        $data->filiais_cad = $request->filiais_cad;  
        $data->filiais_edt = $request->filiais_edt;  
        $data->filiais_del = $request->filiais_del; 

        $data->lancamentos = $request->lancamentos;  
        $data->lancamentos_cad = $request->lancamentos_cad;  
        $data->lancamentos_edt = $request->lancamentos_edt;  
        $data->lancamentos_del = $request->lancamentos_del; 

        $data->pessoas = $request->pessoas;  
        $data->pessoas_cad = $request->pessoas_cad;  
        $data->pessoas_edt = $request->pessoas_edt;  
        $data->pessoas_del = $request->pessoas_del; 

        $data->processos = $request->processos;  
        $data->processos_cad = $request->processos_cad;  
        $data->processos_edt = $request->processos_edt;  
        $data->processos_del = $request->processos_del; 

        $data->usuarios = $request->usuarios;  
        $data->usuarios_cad = $request->usuarios_cad;  
        $data->usuarios_edt = $request->usuarios_edt;  
        $data->usuarios_del = $request->usuarios_del; 


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
            return response()->json('Perfil editado com sucesso!', 200);
        }else{
            $erro = "Não foi possivel realizar a edição!";
            $cod = 171;
            $resposta = ['erro' => $erro, 'cod' => $cod];
            return response()->json($resposta, 404);
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
           return response()->json('Perfil excluído com sucesso!', 200);
         }else{
           $erro = "Não foi possivel realizar a exclusão!";
            $cod = 171;
            $resposta = ['erro' => $erro, 'cod' => $cod];
            return response()->json($resposta, 404);
         }
    }
}

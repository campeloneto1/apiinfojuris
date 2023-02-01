<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Processo;
use App\Models\Log;

class ProcessosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Processo::orderBy('id', 'desc')->get();
        $user = Auth::user();
        if($user->perfil->administrador){
             return Processo::orderBy('id', 'desc')->get();
        }else{ 
            return Processo::where('escritorio_id', $user->escritorio_id)->orderBy('id', 'desc')->get(); 
        }   
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $data = Processo::find($request->id);
        $dataold = $data;

        $data->status_id = $request->status_id;         
        $data->updated_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou o status de um Processo';
            $log->table = 'processos';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->object_old = $dataold;
            $log->save();
            return response()->json('Status modificado com sucesso!', 200);
        }else{
            $erro = "Não foi possivel realizar a edição!";
            $cod = 171;
            $resposta = ['erro' => $erro, 'cod' => $cod];
            return response()->json($resposta, 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = new Processo;

        $data->escritorio_id = $user->escritorio_id;    
        //$data->autor_id = $request->autor_id;   
        //$data->reu_id = $request->reu_id;           
        $data->natureza_id = $request->natureza_id;  
        $data->vara_id = $request->vara_id;  
        $data->codigo = $request->codigo;   
        $data->valor = $request->valor;  
        $data->data = $request->data;  
        $data->obs = $request->obs;  
        $data->status_id = 1;  

        $data->key = bcrypt($request->codigo);  

        $data->created_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um Processo';
            $log->table = 'processos';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return response()->json('Processo cadastrado com sucesso!', 200);
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
        return Processo::with('audiencias')->find($id);
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
        $data = Processo::find($id);
        $dataold = $data;

        //$data->autor_id = $request->autor_id;   
       //$data->reu_id = $request->reu_id;   
        $data->natureza_id = $request->natureza_id;  
        $data->vara_id = $request->vara_id;  
        $data->codigo = $request->codigo;   
        $data->valor = $request->valor;  
        $data->data = $request->data;  
        $data->obs = $request->obs; 
        $data->updated_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Processo';
            $log->table = 'processos';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->object_old = $dataold;
            $log->save();
            return response()->json('Processo editado com sucesso!', 200);
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
        $data = Processo::find($id);
         
        if($data->delete()){
           $log = new Log;
           $log->user_id = Auth::id();
           $log->mensagem = 'Excluiu um Processo';
           $log->table = 'processos';
           $log->action = 3;
           $log->fk = $data->id;
           $log->object = $data;
           $log->save();
           return response()->json('Processo excluído com sucesso!', 200);
         }else{
           $erro = "Não foi possivel realizar a exclusão!";
            $cod = 171;
            $resposta = ['erro' => $erro, 'cod' => $cod];
            return response()->json($resposta, 404);
         }
    }
}

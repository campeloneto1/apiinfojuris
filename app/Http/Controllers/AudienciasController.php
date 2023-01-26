<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Audiencia;
use App\Models\Log;


class AudienciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Audiencia::orderBy('id', 'desc')->get();
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
        $data = new Audiencia;

        $data->processo_id = $request->processo_id;     
        $data->data = $request->data;   
        $data->hora = $request->hora;      
        $data->tipo_id = $request->tipo_id;   

        if($request->tipo_id == 1){
            $data->rua = $request->rua;   
            $data->numero = $request->numero;   
            $data->bairro = $request->bairro;   
            $data->cidade_id = $request->cidade_id;   
            $data->complemento = $request->complemento;   
            $data->cep = $request->cep;  
        }else{
            $data->link = $request->link; 
        }

        $data->status = $request->status;  
        $data->obs = $request->obs;  
        $data->key = bcrypt($request->processo_id.$request->data.$request->hora);  

        $data->created_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma Audiencia';
            $log->table = 'audiencias';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return response()->json('Audiência cadastrada com sucesso!', 200);
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
        return Audiencia::find($id);
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
        $data = Audiencia::find($id);
        $dataold = $data;

        $data->processo_id = $request->processo_id;     
        $data->data = $request->data;   
        $data->hora = $request->hora;      
        $data->tipo_id = $request->tipo_id;   

        if($request->tipo_id == 1){
            $data->rua = $request->rua;   
            $data->numero = $request->numero;   
            $data->bairro = $request->bairro;   
            $data->cidade_id = $request->cidade_id;   
            $data->complemento = $request->complemento;   
            $data->cep = $request->cep;  
        }else{
            $data->link = $request->link; 
        }

        //$data->status = $request->status;  
        $data->obs = $request->obs;  
        //$data->key = bcrypt($request->processo_id.$request->data.$request->hora);  

        $data->updated_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou uma Audiencia';
            $log->table = 'audiencias';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->object_old = $dataold;
            $log->save();
            return response()->json('Audiência editada com sucesso!', 200);
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
        $data = Audiencia::find($id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma Audiencia';
            $log->table = 'audiencias';
            $log->action = 3;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return response()->json('Audiência excluída com sucesso!', 200);
          }else{
            $erro = "Não foi possivel realizar a exclusão!";
            $cod = 171;
            $resposta = ['erro' => $erro, 'cod' => $cod];
            return response()->json($resposta, 404);
          }
    }
}

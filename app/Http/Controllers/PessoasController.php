<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pessoa;
use App\Models\Log;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Pessoa::orderBy('nome')->get();
        $user = Auth::user();
        if($user->perfil->administrador){
             return Pessoa::orderBy('nome', 'asc')->get();
        }else{ 
            return Pessoa::where('escritorio_id', $user->escritorio_id)->orderBy('nome', 'asc')->get(); 
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = new Pessoa;

        $data->escritorio_id = $user->escritorio_id;     
        $data->nome = $request->nome;
        $data->email = $request->email;
        $data->cpf = $request->cpf;    
        $data->data_nascimento = $request->data_nascimento;
        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;

        $data->estado_civil_id = $request->estado_civil_id;
        $data->sexo_id = $request->sexo_id;
        $data->nacionalidade_id = $request->nacionalidade_id;
        $data->ocupacao_id = $request->ocupacao_id;
        $data->mae = $request->mae;
        $data->pai = $request->pai;

        $data->obs = $request->obs;
        $data->key = bcrypt($request->cpf);
      
        $data->cep = $request->cep;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->cidade_id = $request->cidade_id;

        $data->created_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um Pessoa';
            $log->table = 'clientes';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return response()->json('Pessoa cadastrado com sucesso!', 200);
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
        return Pessoa::find($id);
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
        $data = Pessoa::find($id);
        $dataold = $data;

        $data->nome = $request->nome;
        $data->email = $request->email;
        $data->cpf = $request->cpf;    
        $data->data_nascimento = $request->data_nascimento;
        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;

        $data->estado_civil_id = $request->estado_civil_id;
        $data->sexo_id = $request->sexo_id;
        $data->nacionalidade_id = $request->nacionalidade_id;
        $data->ocupacao_id = $request->ocupacao_id;
        $data->mae = $request->mae;
        $data->pai = $request->pai;

        $data->obs = $request->obs;
        //$data->key = bcrypt($request->cpf);
      
        $data->cep = $request->cep;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->cidade_id = $request->cidade_id;


        $data->updated_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Pessoa';
            $log->table = 'clientes';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->object_old = $dataold;
            $log->save();
            return response()->json('Pessoa editado com sucesso!', 200);
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
        $data = Pessoa::find($id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um Pessoa';
            $log->table = 'clientes';
            $log->action = 3;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return response()->json('Pessoa excluído com sucesso!', 200);
          }else{
            $erro = "Não foi possivel realizar a exclusão!";
            $cod = 171;
            $resposta = ['erro' => $erro, 'cod' => $cod];
            return response()->json($resposta, 404);
          }
    }
}

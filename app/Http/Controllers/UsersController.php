<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Log;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::orderBy('nome')->get();
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changPass(Request $request)
    {
        $data = User::find(Auth::id());
    
        $data->password = bcrypt($request->senha);

        $data->created_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Alterou a senha';
            $log->table = 'users';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            
            return response()->json('Senha alterada com sucesso!', 200);
        }else{
            $erro = "Não foi possivel realizar o cadastro!";
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
    public function resetPass($id)
    {
        $data = User::find($id);
    
        $data->password = bcrypt($data->cpf);

        $data->created_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Resetou a senha';
            $log->table = 'users';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            
            return response()->json('Senha alterada com sucesso!', 200);
        }else{
            $erro = "Não foi possivel realizar o cadastro!";
            $cod = 171;
            $resposta = ['erro' => $erro, 'cod' => $cod];
            return response()->json($resposta, 404);
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
        $data = new User;

        $data->escritorio_id = $request->escritorio_id;  
        $data->perfil_id = $request->perfil_id;     
        $data->nome = $request->nome;
        $data->email = $request->email;
        $data->cpf = $request->cpf;    
        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;

        $data->key = bcrypt($request->cpf);
        $data->password = bcrypt($request->cpf);

        $data->created_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um User';
            $log->table = 'users';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            
            return response()->json('Usuário cadastrado com sucesso!', 200);
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
        return User::find($id);
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
        $data = User::find($id);
        $dataold = $data;

        $data->escritorio_id = $request->escritorio_id;  
        $data->perfil_id = $request->perfil_id;     
        $data->nome = $request->nome;
        $data->email = $request->email;
        $data->cpf = $request->cpf;    
        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;

        $data->updated_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um User';
            $log->table = 'users';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->object_old = $dataold;
            $log->save();
             return response()->json('Usuário editado com sucesso!', 200);
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
        $data = User::find($id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um User';
            $log->table = 'users';
            $log->action = 3;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return response()->json('Usuário excluído com sucesso!', 200);
          }else{
             $erro = "Não foi possivel realizar a exclusão!";
            $cod = 171;
            $resposta = ['erro' => $erro, 'cod' => $cod];
            return response()->json($resposta, 404);
          }
    }
}

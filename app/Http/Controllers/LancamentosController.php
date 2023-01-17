<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Administracao;
use App\Models\Lancamento;
use App\Models\Log;

class LancamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Lancamento::orderBy('id', 'desc')->get();
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
        $dt = Carbon::now();  
        $data = new Lancamento;

        $data->escritorio_id = $request->escritorio_id;
        //$cod =  Documento::where('documento_tipo_id', $request->documento_tipo_id)->whereYear('created_at', $hoje->format('Y'))->max('codigo');
        $cod = Lancamento::where('escritorio_id', $request->escritorio_id)->max('codigo');
        $data->codigo =  $cod+1;
        $valor = Administracao::where('status', 1)->select('valor')->limit(1)->get();
        $data->valor = $valor[0]->valor;    
        if($request->desconto){
            $data->valor_liquido = $valor[0]->valor - $request->desconto;
            $data->desconto = $request->desconto;
        }
        if($request->porcentagem){
            $data->valor_liquido = $valor[0]->valor * ((100 - $request->porcentagem)/100);
            $data->porcentagem = $request->porcentagem;
        }
        if(!$request->porcentagem && !$request->desconto){
            $data->valor_liquido = $valor[0]->valor;            
        }
        
        //$data->data = $request->data;
        
        $data->data_vencimento = $dt->addMonth();

        $data->key = bcrypt($cod+1);

        $data->created_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um Lancamento';
            $log->table = 'lancamentos';
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
        return Lancamento::find($id);
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
        $data = Lancamento::find($id);
        $dataold = $data;

        $data->escritorio_id = $request->escritorio_id;
        //$data->codigo = Lancamento::where('escritorio_id', $request->escritorio_id)->select('codigo')->orderBy('id', 'desc')->limit(1)->get()[0]+1;
        //$data->valor = Administracao::where('status', 1)->select('valor')->limit(1)->get()[0];    
        if($request->desconto){
            $data->valor_liquido = $data->valor - $request->desconto;
            $data->desconto = $request->desconto;
        }else{
            $data->valor_liquido = $data->valor * (100 - $request->porcentagem);
            $data->porcentagem = $request->porcentagem;
        }
        
        $data->data = $request->data;
        $data->data_vencimento = $request->telefone2;

        $data->updated_by = Auth::id();      

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um Lancamento';
            $log->table = 'lancamentos';
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
        $data = Lancamento::find($id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um Lancamento';
            $log->table = 'lancamentos';
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

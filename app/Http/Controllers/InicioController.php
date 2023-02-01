<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Processo;

class InicioController extends Controller
{
    public function quantPorStatus(){
        return Processo::select(DB::raw('status.nome, COUNT(processos.id) as quant'))->get();
    }
}

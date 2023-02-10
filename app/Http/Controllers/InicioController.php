<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Audiencia;
use App\Models\Processo;

class InicioController extends Controller
{
    public function quantPorStatus(){
        $user = Auth::user();
        if($user->perfil->administrador){
             return Processo::query()
             ->join('status', 'status.id', '=', 'processos.status_id')
            ->select('status.nome', DB::raw('COUNT(processos.id) as quant'))
            ->groupBy('status.nome')
            ->orderBy('status.nome')
            ->get();
        }else{ 
            return Processo::query()
             ->join('status', 'status.id', '=', 'processos.status_id')
            ->select('status.nome', DB::raw('COUNT(processos.id) as quant'))
            ->where('processos.escritorio_id', $user->escritorio_id)
            ->groupBy('status.nome')
            ->orderBy('status.nome')
            ->get();
           
        }    
    }

    public function proximasAudiencias(){
        $hj = Carbon::now();
        $user = Auth::user();

        if($user->perfil->administrador){
             return Audiencia::whereDate('data', '>', $hj->subDays(1))
            ->whereDate('data', '<', $hj->addDays(8))
            ->orderBy('data')
            ->orderBy('hora')
            ->get();
        }else{ 
            return Audiencia::whereRelation('processo','escritorio_id', $user->escritorio_id)
            ->whereDate('data', '>', $hj->subDays(1))
            ->whereDate('data', '<', $hj->addDays(8))
            ->orderBy('data')
            ->orderBy('hora')
            ->get();
           
        }    
    }
}

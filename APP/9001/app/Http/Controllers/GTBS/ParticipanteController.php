<?php

namespace App\Http\Controllers\GTBS;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\GTBSParticipantes;
use App\Models\GTBSTemas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GTBS\GTBSParticipantesFormRequest;
use RegBitacora;

class ParticipanteController extends Controller
{
/////////////////////////////////////// STATIC \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

//-------[[[SAMPLE]]]

    public static function samplestatic()
    {

    }

//-------[[[TEMA]]]

public static function tema($id)
{
    $tema = GTBSTemas::find($id);
    return $tema;
}

//-------[[[MAXIMO]]]
    
public static function maximo($id)
{
    $participantes = GTBSParticipantes::where([
        ['tema','=',$id]
        ])
    ->get();

    $totalparticipantes = $participantes->count();

    $tema = GTBSTemas::find($id);

    $maximoparticipantes = $tema->participantes;

    if ($totalparticipantes < $maximoparticipantes)
    {
        return 0;
    } elseif ($totalparticipantes == $maximoparticipantes) 
    {
        return 1;
    } elseif ($totalparticipantes > $maximoparticipantes) 
    {
        return 1;
    }  
}

//-------[[[LIST]]]

public function list(Request $request){

    $participante = GTBSParticipantes::where([
        ['tema','=', $request->tema]
        ])
    ->get();

    $tema = $this->tema($request->tema);
    
    return view('gtbs.administracion.participante.list', compact('participante', 'tema'));

}

//-------[[[SELECT]]]

    public static function select()
    {
        $tema = GTBSTemas::where([
            ['status','=',1]
            ])
        ->orderBy('id', 'asc')
        ->get();
        return view('gtbs.administracion.participante.select', compact('tema'));
    }    

//////////////////////////////////// PARTICIPANTES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

//-------[[[STORE]]]

    public function store(GTBSParticipantesFormRequest $request){

        $maximo = $this->maximo($request->tema);
        $tema = $this->tema($request->tema);

        switch ($maximo) {
            case '0':
                    $participante = new GTBSParticipantes;
                    $participante->create($request->all());    
                
                    return view('gtbs.participante.registro', compact('tema'));
                    break;
            case '1':
                    return view('gtbs.participante.maximo', compact('tema'));
                    break;
        }         

    }

//-------[[[NEW]]]

    public function new($id){
        $maximo = $this->maximo($id);
        $tema = $this->tema($id);

        switch ($maximo) {
            case '0':
                      return view('gtbs.participante.new', compact('tema'));
                      break;
            case '1':
                      return view('gtbs.participante.maximo', compact('tema'));
                      break;
        }   
    }

}

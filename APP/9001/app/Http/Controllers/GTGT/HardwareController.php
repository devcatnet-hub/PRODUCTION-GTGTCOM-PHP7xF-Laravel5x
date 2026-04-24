<?php

namespace App\Http\Controllers\GTGT;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\GTGTHardware;
use App\Models\GTGTHardwareHistory;
use App\Models\GTGTPersonas;
use App\Models\GTGTObject;
use App\Models\GTGTObjectCategory;
use App\Http\Requests\GTGT\GTGTHardwareFormRequest;
use App\Http\Requests\GTGT\GTGTUpdateHardwareFormRequest;
use App\Http\Requests\GTGT\GTGTHardwareHistoryFormRequest;
use App\Imports\HardwareImportModel;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Exports\HardwareExport;

use RegBitacora;

class HardwareController extends Controller
{
/////////////////////////////////////// STATIC \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

//-------[[[SAMPLE]]]------[[[STATIC]]]

public static function samplestaticfunction()
{
    
}

//-------[[[NA]]]

public static function na($value)
{
    switch ($value) {
        default:           
                return $value;
                break;
        case '0':
            return 'N/A';
            break;
        case Null:
            return 'N/A';
            break;
    }  
}

//-------[[[DETALLES]]]

public static function detalles($value)
{
    switch ($value) {
        case '0':
            return ' ';
            break;
        case Null:
            return ' ';
            break;
        default:           
                return $value;
                break;
    }  
}

//-------[[[SINO]]]

public static function sino($value)
{
    switch ($value) {
        case '1':           
                return 'SI';
                break;
        case '0':
            return 'NO';
            break;
        case Null:
            return 'NO';
            break;
    }  
}

//-------[[[FUNCIONA?]]]

public static function funciona($entrega, $funciona)
{
    switch ($entrega) {
        case '1':           
                    switch ($funciona) {
                        case '1':           
                            return 'SI';
                            break;
                        case '0':
                            return 'NO';
                            break;
                        case Null:
                            return 'NO';
                            break;
                    }
        case '0':
            return 'N/A';
            break;
        case Null:
            return 'N/A';
            break;
    }  
}

//-------[[[SAMPLE]]]

public function samplefunction()
{

}

//-------[[[EXCEL]]]

public function excel(Request $request)
{   
        if ($request->status == 'all'){
            if ($request->tipo == 'all' && $request->marca == 'all' && $request->modelo == 'all'){

                    $hardware = GTGTHardware::orderBy('status', 'asc')->get();                  

            }elseif ($request->tipo == 'all' && $request->marca == 'all' && $request->modelo != 'all'){

                    $hardware = GTGTHardware::where([
                        ['modelo', $request->modelo]               
                        ])
                        ->orderBy('status', 'asc')
                        ->get();

            }elseif ($request->tipo == 'all' && $request->marca != 'all' && $request->modelo == 'all'){

                    $hardware = GTGTHardware::where([
                        ['marca', $request->marca]             
                        ])
                        ->orderBy('status', 'asc')
                        ->get();

            }elseif ($request->tipo == 'all' && $request->marca != 'all' && $request->modelo != 'all'){

                    $hardware = GTGTHardware::where([  
                        ['marca', $request->marca],
                        ['marca', $request->modelo]             
                        ])
                        ->orderBy('status', 'asc')
                        ->get();

            }elseif ($request->tipo != 'all' && $request->marca == 'all' && $request->modelo == 'all'){

                $hardware = GTGTHardware::where([  
                    ['tipo', $request->tipo]           
                    ])
                    ->orderBy('status', 'asc')
                    ->get();

            }elseif ($request->tipo != 'all' && $request->marca == 'all' && $request->modelo != 'all'){

                $hardware = GTGTHardware::where([  
                    ['tipo', $request->tipo],
                    ['modelo', $request->modelo]          
                    ])
                    ->orderBy('status', 'asc')
                    ->get();

            }elseif ($request->tipo != 'all' && $request->marca != 'all' && $request->modelo == 'all'){

                $hardware = GTGTHardware::where([  
                    ['tipo', $request->tipo],
                    ['marca', $request->marca]          
                    ])
                    ->orderBy('status', 'asc')
                    ->get();

            }elseif ($request->tipo != 'all' && $request->marca != 'all' && $request->modelo != 'all'){

                $hardware = GTGTHardware::where([  
                    ['tipo', $request->tipo],
                    ['marca', $request->marca],
                    ['modelo', $request->modelo]          
                    ])
                    ->orderBy('status', 'asc')
                    ->get();

            }
        }elseif ($request->status != 'all'){

            if ($request->tipo == 'all' && $request->marca == 'all' && $request->modelo == 'all'){

                $hardware = GTGTHardware::where([  
                    ['status', $request->status]         
                    ])
                    ->orderBy('inventario', 'asc')
                    ->get();              

            }elseif ($request->tipo == 'all' && $request->marca == 'all' && $request->modelo != 'all'){

                    $hardware = GTGTHardware::where([
                        ['modelo', $request->modelo],
                        ['status', $request->status]              
                        ])
                        ->orderBy('modelo', 'asc')
                        ->get();

            }elseif ($request->tipo == 'all' && $request->marca != 'all' && $request->modelo == 'all'){

                    $hardware = GTGTHardware::where([
                        ['marca', $request->marca],
                        ['status', $request->status]             
                        ])
                        ->orderBy('marca', 'asc')
                        ->get();

            }elseif ($request->tipo == 'all' && $request->marca != 'all' && $request->modelo != 'all'){

                    $hardware = GTGTHardware::where([  
                        ['marca', $request->marca],
                        ['marca', $request->modelo],
                        ['status', $request->status]             
                        ])
                        ->orderBy('modelo', 'asc')
                        ->get();

            }elseif ($request->tipo != 'all' && $request->marca == 'all' && $request->modelo == 'all'){

                $hardware = GTGTHardware::where([  
                    ['tipo', $request->tipo],
                    ['status', $request->status]           
                    ])
                    ->orderBy('tipo', 'asc')
                    ->get();

            }elseif ($request->tipo != 'all' && $request->marca == 'all' && $request->modelo != 'all'){

                $hardware = GTGTHardware::where([  
                    ['tipo', $request->tipo],
                    ['modelo', $request->modelo],
                    ['status', $request->status]          
                    ])
                    ->orderBy('marca', 'asc')
                    ->get();

            }elseif ($request->tipo != 'all' && $request->marca != 'all' && $request->modelo == 'all'){

                $hardware = GTGTHardware::where([  
                    ['tipo', $request->tipo],
                    ['marca', $request->marca],
                    ['status', $request->status]          
                    ])
                    ->orderBy('status', 'asc')
                    ->get();

            }elseif ($request->tipo != 'all' && $request->marca != 'all' && $request->modelo != 'all'){

                $hardware = GTGTHardware::where([  
                    ['tipo', $request->tipo],
                    ['marca', $request->marca],
                    ['modelo', $request->modelo],
                    ['status', $request->status]          
                    ])
                    ->orderBy('status', 'asc')
                    ->get();

            }
        }

        if ($request->export == '1'){
            return view('gtgt.hardware.data', compact('hardware'));
        } elseif ($request->export == '2'){

                $hardmap = $hardware->map(function ($hardware) {

                    $inventario = $hardware["inventario"];
                    $tipo = $hardware["tipo"];
                    $numeroserie = $hardware["numeroserie"];
                    $marca = $hardware["marca"];
                    $modelo = $this->na($hardware["modelo"]);     
                    $seriecargador = $this->na($hardware["seriecargador"]);

                    if ($hardware["status"] == "0"){
                        $status = 'Sin Asignar';
                        $persona = 'Sin Asignar';
                    } elseif ($hardware["status"] == "1"){
                        $persona = GTGTPersonas::find($hardware["persona"]);
                        $persona = $persona->nombres.' '.$persona->apellidos;
                        $status = 'Asignado';
                    } elseif ($hardware["status"] == "2"){
                        $status = 'Dado de Baja';
                        $persona = 'Dado de Baja'; 
                    }

                    $fechadecompra = $this->na($hardware["fechadecompra"]);
                    $fechaasignacion = $this->na($hardware["fechaasignacion"]);
                    $fechadesasignacion = $this->na($hardware["fechadesasignacion"]);

                    $hd = $this->na($hardware["hd"]);
                    $ram = $this->na($hardware["ram"]);
                    $cpu = $this->na($hardware["cpu"]);
                    $led = $this->na($hardware["led"]);
                    $lector = $this->na($hardware["lector"]);
                    $red = $this->na($hardware["red"]);
                    $otro = $this->na($hardware["otro"]);
                    
                    return [
                        'inventario' => $inventario, 
                        'tipo' => $tipo, 
                        'numeroserie' => $numeroserie, 
                        'marca' => $marca,  
                        'modelo' => $modelo,  
                        'seriecargador' => $seriecargador,
                        'status' => $status,   
                        'persona' => $persona,                   
                        'fechadecompra' => $fechadecompra,  
                        'fechaasignacion' => $fechaasignacion,  
                        'fechadesasignacion' => $fechadesasignacion,  
                        'hd' => $hd,  
                        'ram' => $ram,  
                        'cpu' => $cpu,  
                        'led' => $led,  
                        'lector' => $lector,  
                        'red' => $red,  
                        'otro' => $otro,               
                    ];
                });
                
                
                return (new HardwareExport($hardmap))->download('hardware.xlsx');
            }
                
        }

//-------[[[REPORT]]]

public function report()
{
    $tipo = GTGTHardware::select('tipo')->distinct()->get();
    $marca = GTGTHardware::select('marca')->distinct()->get();
    $modelo = GTGTHardware::select('modelo')->distinct()->get();

    return view('gtgt.hardware.report', compact('tipo', 'marca', 'modelo')); 
}

//-------[[[CARD]]]

public function card($id, $status)
{
    $hardware = GTGTHardware::where([
        ['id', $id]
        ])
        ->first();          
    $persona = GTGTPersonas::where([
        ['id', $hardware->persona]
        ])
        ->first(); 

    $nombre = $persona->nombres.' '.$persona->apellidos;
    $fecha = date("d/m/Y");

    switch ($status) {
        case '1':
            $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/public/templates/entrega.activos.docx')); 
            break;
        case '0':
            $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/public/templates/retirode.activos.docx'));
            break;
    }
    
    $my_template->setValue('nombre', $nombre);
    $my_template->setValue('fecha', $fecha); 
    $my_template->setValue('area', $persona->departamento);
    $my_template->setValue('puesto', $persona->puesto);
    $my_template->setValue('dpi', $persona->dpi);

    $my_template->setValue('numeroserie', $hardware->numeroserie);
    $my_template->setValue('inventario', $hardware->inventario);
    $my_template->setValue('tipo', $hardware->tipo);
    $my_template->setValue('marca', $hardware->marca);
    $my_template->setValue('modelo', $hardware->modelo);
    $my_template->setValue('led', $this->detalles($hardware->led));
    $my_template->setValue('hd', $this->detalles($hardware->hd));
    $my_template->setValue('ram', $this->detalles($hardware->ram));
    $my_template->setValue('cpu', $this->detalles($hardware->cpu));
    $my_template->setValue('lector', $this->detalles($hardware->lector));
    $my_template->setValue('red', $this->detalles($hardware->red));
    $my_template->setValue('otro', $this->detalles($hardware->otro));

    $my_template->setValue('tled', $this->sino($hardware->tled));
    $my_template->setValue('fled', $this->funciona($hardware->tled,$hardware->fled));
    $my_template->setValue('tkey', $this->sino($hardware->tkey));
    $my_template->setValue('fkey', $this->funciona($hardware->tkey,$hardware->fkey));
    $my_template->setValue('tmouse', $this->sino($hardware->tmouse));
    $my_template->setValue('fmouse', $this->funciona($hardware->tmouse,$hardware->fmouse));
    $my_template->setValue('thd', $this->sino($hardware->thd));
    $my_template->setValue('fhd', $this->funciona($hardware->thd,$hardware->fhd));
    $my_template->setValue('tram', $this->sino($hardware->tram));
    $my_template->setValue('fram', $this->funciona($hardware->tram,$hardware->fram));
    $my_template->setValue('tcpu', $this->sino($hardware->tcpu));
    $my_template->setValue('fcpu', $this->funciona($hardware->tcpu,$hardware->fcpu));
    $my_template->setValue('tboard', $this->sino($hardware->tboard));
    $my_template->setValue('fboard', $this->funciona($hardware->tboard,$hardware->fboard));
    $my_template->setValue('tlector', $this->sino($hardware->tlector));
    $my_template->setValue('flector', $this->funciona($hardware->tlector,$hardware->flector));
    $my_template->setValue('tcargador', $this->sino($hardware->tcargador));
    $my_template->setValue('fcargador', $this->funciona($hardware->tcargador,$hardware->fcargador));
    $my_template->setValue('tred', $this->sino($hardware->tred));
    $my_template->setValue('fred', $this->funciona($hardware->tred,$hardware->fred));
    $my_template->setValue('tsound', $this->sino($hardware->tsound));
    $my_template->setValue('fsound', $this->funciona($hardware->tsound,$hardware->fsound));
    $my_template->setValue('tvideo', $this->sino($hardware->tvideo));
    $my_template->setValue('fvideo', $this->funciona($hardware->tvideo,$hardware->fvideo));
    $my_template->setValue('tprinter', $this->sino($hardware->tprinter));
    $my_template->setValue('fprinter', $this->funciona($hardware->tprinter,$hardware->fprinter));
    $my_template->setValue('tbocinas', $this->sino($hardware->tbocinas));
    $my_template->setValue('fbocinas', $this->funciona($hardware->tbocinas,$hardware->fbocinas));
    $my_template->setValue('tcañonera', $this->sino($hardware->tcañonera));
    $my_template->setValue('fcañonera', $this->funciona($hardware->tcañonera,$hardware->fcañonera));

    try{
        $my_template->saveAs(storage_path('app/public/templates/activos.docx'));
    }catch (Exception $e){
        //handle exception
    }

    return response()->download(storage_path('app/public/templates/activos.docx'));
}

//-------[[[UPDATE]]]

public function update(GTGTUpdateHardwareFormRequest $request)
{
    $hardware = GTGTHardware::find($request->id);

    $hardware->tipo = $request->tipo;
    $hardware->marca = $request->marca;
    $hardware->modelo = $request->modelo;
    $hardware->seriecargador = $request->seriecargador;
    $hardware->persona = $request->persona;
    $hardware->status = $request->status;
    $hardware->fechadecompra = $request->fechadecompra;
    $hardware->hd = $request->hd;
    $hardware->ram = $request->ram;
    $hardware->cpu = $request->cpu;
    $hardware->led = $request->led;
    $hardware->tled = $request->tled;
    $hardware->fled = $request->fled;
    $hardware->tkey = $request->tkey;
    $hardware->fkey = $request->fkey;
    $hardware->tmouse = $request->tmouse;
    $hardware->fmouse = $request->fmouse;
    $hardware->thd = $request->thd;
    $hardware->fhd = $request->fhd;
    $hardware->tram = $request->tram;
    $hardware->fram = $request->fram;
    $hardware->tcpu = $request->tcpu;
    $hardware->fcpu = $request->fcpu;
    $hardware->tboard = $request->tboard;
    $hardware->fboard = $request->fboard;
    $hardware->tlector = $request->tlector;
    $hardware->lector = $request->lector;
    $hardware->flector = $request->flector;
    $hardware->tcargador = $request->tcargador;
    $hardware->fcargador = $request->fcargador;
    $hardware->tred = $request->tred;
    $hardware->fred = $request->fred;
    $hardware->red = $request->red;
    $hardware->tsound = $request->tsound;
    $hardware->fsound = $request->fsound;
    $hardware->tvideo = $request->tvideo;
    $hardware->fvideo = $request->fvideo;
    $hardware->tprinter = $request->tprinter;
    $hardware->fprinter = $request->fprinter;
    $hardware->tbocinas = $request->tbocinas;
    $hardware->fbocinas = $request->fbocinas;
    $hardware->tcañonera = $request->tcañonera;
    $hardware->fcañonera = $request->fcañonera;
    $hardware->otro = $request->otro;

    $hardware->save();

    return redirect("/gtlisthardware/1");
}

//-------[[[NEW]]]

public function new(GTGTHardwareFormRequest $request)
{
    $hardware = new GTGTHardware;

    $hardware->inventario = $request->inventario;
    $hardware->tipo = $request->tipo;
    $hardware->numeroserie = $request->numeroserie;
    $hardware->marca = $request->marca;
    $hardware->modelo = $request->modelo;
    $hardware->seriecargador = $request->seriecargador;
    $hardware->persona = $request->persona;
    $hardware->status = $request->status;
    $hardware->fechadecompra = $request->fechadecompra;
    $hardware->hd = $request->hd;
    $hardware->ram = $request->ram;
    $hardware->cpu = $request->cpu;
    $hardware->led = $request->led;
    $hardware->tled = $request->tled;
    $hardware->fled = $request->fled;
    $hardware->tkey = $request->tkey;
    $hardware->fkey = $request->fkey;
    $hardware->tmouse = $request->tmouse;
    $hardware->fmouse = $request->fmouse;
    $hardware->thd = $request->thd;
    $hardware->fhd = $request->fhd;
    $hardware->tram = $request->tram;
    $hardware->fram = $request->fram;
    $hardware->tcpu = $request->tcpu;
    $hardware->fcpu = $request->fcpu;
    $hardware->tboard = $request->tboard;
    $hardware->fboard = $request->fboard;
    $hardware->tlector = $request->tlector;
    $hardware->lector = $request->lector;
    $hardware->flector = $request->flector;
    $hardware->tcargador = $request->tcargador;
    $hardware->fcargador = $request->fcargador;
    $hardware->tred = $request->tred;
    $hardware->fred = $request->fred;
    $hardware->red = $request->red;
    $hardware->tsound = $request->tsound;
    $hardware->fsound = $request->fsound;
    $hardware->tvideo = $request->tvideo;
    $hardware->fvideo = $request->fvideo;
    $hardware->tprinter = $request->tprinter;
    $hardware->fprinter = $request->fprinter;
    $hardware->tbocinas = $request->tbocinas;
    $hardware->fbocinas = $request->fbocinas;
    $hardware->tcañonera = $request->tcañonera;
    $hardware->fcañonera = $request->fcañonera;
    $hardware->otro = $request->otro;

    $hardware->save();

    return redirect("/gtlisthardware/0");
}

//-------[[[DATA]]]

public function data($data, $id=Null)
{
    switch ($data) {
        case '0':
            $counthardware = GTGTHardware::count();
            $counthardware = $counthardware + 1;
            $hardware = GTGTHardware::select('tipo', 'marca', 'modelo', 'hd', 'ram', 'cpu', 'led', 'lector', 'red', 'otro')->distinct()->get();
            return view('gtgt.hardware.new', compact('counthardware', 'hardware'));
            break;
        case '1':
            $hardware = GTGTHardware::select('tipo', 'marca', 'modelo', 'hd', 'ram', 'cpu', 'led', 'lector', 'red', 'otro')->distinct()->get();
            $edithardware = GTGTHardware::where([
                ['id', $id]
                ])
                ->first(); 
            return view('gtgt.hardware.edit', compact('hardware', 'edithardware'));
            break;

      }
}


//-------[[[LOSS]]]

public function loss($idhardware)
{
    $data = array(
        'title' => 'Dar de baja definitiva a Hardware.',
        'idhardware' => $idhardware,
        );

    return view('gtgt.hardware.loss', compact('data'));
}

//-------[[[HISTORY]]]

public function history($idhardware)
{
    $hardwarehistory = GTGTHardwareHistory::where([
        ['hardware','=',$idhardware]
        ])
        ->paginate(5);

        return view('gtgt.hardware.history', compact('hardwarehistory'));
}

//-------[[[SEARCH]]]

public function search(Request $request)
{

    switch ($request->search) {
        case 'numeroserie':
            $hardware = GTGTHardware::where([
                [$request->search,'like','%'.$request->term.'%']               
                ])
                ->paginate(20000);
            break;
        case 'inventario':
            $hardware = GTGTHardware::where([
                [$request->search,'=',$request->term]               
                ])
                ->paginate(20000);
            break;
        case 'tipo':
            $hardware = GTGTHardware::where([
                [$request->search,'=',$request->tipo]               
                ])
                ->paginate(20000);
            break;
        case 'marca':
            $hardware = GTGTHardware::where([
                [$request->search,'=',$request->marca]               
                ])
                ->paginate(20000);
            break;
        case 'modelo':
            $hardware = GTGTHardware::where([
                [$request->search,'=',$request->modelo]               
                ])
                ->paginate(20000);
            break;
    }

    $tipohardware = GTGTHardware::select('tipo')->distinct()->get();
    $marcahardware = GTGTHardware::select('marca')->distinct()->get();
    $modelohardware = GTGTHardware::select('modelo')->distinct()->get();

    $data = array(
        'idpersona' => 0,
        'back' => '1',
        'title' => 'Busqueda de Hardware',
        'persona' => 0,
        'search' => 1,
        'opt' => 1,
        );

        return view('gtgt.hardware.list', compact('hardware', 'data', 'tipohardware', 'marcahardware', 'modelohardware'));
}

//-------[[[LIST]]]

public function list($status)
{

    $hardware = GTGTHardware::where([
        ['status','=',$status]
        ])
        ->paginate(10);

        $tipohardware = GTGTHardware::select('tipo')->distinct()->get();
        $marcahardware = GTGTHardware::select('marca')->distinct()->get();
        $modelohardware = GTGTHardware::select('modelo')->distinct()->get();

    if ($status == 1){
        $title = 'Listado de Hardware Asignado.';
        $back = 1;
    }elseif ($status == 0){
        $title = 'Listado de Hardware Disponible.';
        $back = 2;
    }elseif ($status == 2){
        $title = 'Listado de Hardware dado de Baja.';
        $back = 1;
    }

    $data = array(
        'idpersona' => 0,
        'back' => $back,
        'title' => $title,
        'persona' => 0,
        'search' => 0,
        'opt' => $status,
        );

        return view('gtgt.hardware.list', compact('hardware', 'data', 'tipohardware', 'marcahardware', 'modelohardware'));
}

//-------[[[REMOVE]]]

public function remove($idpersona, $idhardware)
{
    $data = array(
        'idpersona' => $idpersona,
        'title' => 'Retirar equipo.',
        'idhardware' => $idhardware,
        );

    return view('gtgt.hardware.remove', compact('data'));
}

//-------[[[INFO]]]

public function info($id)
{
    $persona = GTGTPersonas::where([
        ['id', $id]
        ])
        ->first();
    
    $hardware = GTGTHardware::where([
        ['persona', $id]
        ])
        ->get();

    $object = GTGTObject::where([
        ['persona', $id]
        ])
        ->get();

    $objectcategory = GTGTObjectCategory::get();

    $data = array(
        'idpersona' => $id,
        'persona' => $persona->nombres.' '.$persona->apellidos,
        );

        return view('gtgt.hardware.info', compact('persona', 'hardware', 'data', 'object', 'objectcategory'));
}

//-------[[[STORE]]]

public function store(GTGTHardwareHistoryFormRequest $request)
{

    $hardware = GTGTHardware::find($request->idhardware);                
                $hardware->status = $request->store;
                if ($request->store == 1) {
                    $hardware->persona = $request->idpersona;
                    $hardware->fechaasignacion = $request->fechaevento;
                } elseif ($request->store == 0) {
                    $hardware->persona = 0;
                    $hardware->fechadesasignacion = $request->fechaevento;
                } elseif ($request->store == 2) {
                    $hardware->persona = 0;
                }
                $hardware->save();

                if ($request->idpersona != 0){            

                    $persona = GTGTPersonas::where([
                        ['id', $request->idpersona]
                        ])
                        ->first();
                    
                }

    $hardwarehistory = new GTGTHardwareHistory;
                $hardwarehistory->hardware = $request->idhardware;
                
                $hardwarehistory->persona = $request->idpersona;

                $hardwarehistory->fechaevento = $request->fechaevento;

                if ($request->store == 1) {
                    $hardwarehistory->evento = 'Se asigno Hardware a: '.$persona->nombres.' '.$persona->apellidos;
                } elseif ($request->store == 0) {
                    $hardwarehistory->evento = 'Se retiro Hardware a: '.$persona->nombres.' '.$persona->apellidos;
                } elseif ($request->store == 2) {
                    $hardwarehistory->evento = 'Se retiro Hardware definitivamente.';
                }
                $hardwarehistory->notas = $request->notas;
                $hardwarehistory->save();

                if ($request->store == 1) {
                    return redirect("/gtlistpersona/1/apellidos/asc");
                } elseif ($request->store == 0) {
                    return redirect("/gtinfopersona/$request->idpersona");
                } elseif ($request->store == 2) {
                    return redirect("/gtlisthardware/2");
                }   

}

//-------[[[ADD]]]

public function add($idpersona, $back, $idhardware)
{
    $data = array(
        'idpersona' => $idpersona,
        'back' => $back,
        'title' => 'Asignar equipo.',
        'idhardware' => $idhardware,
        );

    return view('gtgt.hardware.add', compact('data'));
}

//-------[[[ASSIGN]]]

public function toassign($idpersona, $back)
{
    $hardware = GTGTHardware::where([
        ['status','=',0]
        ])
        ->paginate(10);

    $persona = GTGTPersonas::where([
        ['id', $idpersona]
        ])
        ->first();

    $data = array(
        'idpersona' => $idpersona,
        'back' => $back,
        'title' => 'Listado de Harware disponible.',
        'persona' => $persona->nombres.' '.$persona->apellidos,
        'search' => 0,
        'opt' => 1,
        );

        $tipohardware = GTGTHardware::select('tipo')->distinct()->get();
        $marcahardware = GTGTHardware::select('marca')->distinct()->get();
        $modelohardware = GTGTHardware::select('modelo')->distinct()->get();

        return view('gtgt.hardware.list', compact('hardware', 'data', 'tipohardware', 'marcahardware', 'modelohardware'));
}

//-------[[[IMPORT]]]

public function import(Request $request)
{
    Excel::import(new HardwareImportModel, request()->file('list'));
    return redirect('/gtgtimporthardware')->with('success', 'La importación fue un éxito!!');
    
}

}
<?php

namespace App\Http\Controllers\GTGT;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\GTGTPersonas;
use App\Http\Requests\GTGT\GTGTPersonasFormRequest;
use App\Imports\PersonaImportModel;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Exports\PersonaExport;

use RegBitacora;

class PersonaController extends Controller
{
/////////////////////////////////////// STATIC \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

//-------[[[SAMPLE]]]------[[[STATIC]]]

public static function samplestaticfunction()
{
    
}

//-------[[[SAMPLE]]]

public function samplefunction()
{

}

//-------[[[EXCEL]]]

public function excel(Request $request)
{   
        if ($request->status == 'all'){
            if ($request->departamento == 'all' && $request->puesto == 'all'){

                    $personas = GTGTPersonas::paginate(20000);

            }elseif ($request->departamento != 'all' && $request->puesto == 'all'){

                    $personas = GTGTPersonas::where([
                        ['departamento', $request->departamento]               
                        ])
                        ->paginate(20000);

            }elseif ($request->departamento == 'all' && $request->puesto != 'all'){

                    $personas = GTGTPersonas::where([
                        ['puesto', $request->puesto]               
                        ])
                        ->paginate(20000);

            }elseif ($request->departamento != 'all' && $request->puesto != 'all'){

                    $personas = GTGTPersonas::where([
                        ['departamento', $request->departamento],
                        ['puesto', $request->puesto]                
                        ])
                        ->paginate(20000);

            }
        }elseif ($request->status != 'all'){

            if ($request->departamento == 'all' && $request->puesto == 'all'){

                    $personas = GTGTPersonas::where([
                        ['status', $request->status]               
                        ])
                        ->paginate(20000);

            }elseif ($request->departamento != 'all' && $request->puesto == 'all'){

                    $personas = GTGTPersonas::where([
                        ['status', $request->status],
                        ['departamento', $request->departamento]               
                        ])
                        ->paginate(20000);

            }elseif ($request->departamento == 'all' && $request->puesto != 'all'){

                    $personas = GTGTPersonas::where([
                        ['status', $request->status],
                        ['puesto', $request->puesto]               
                        ])
                        ->paginate(20000);

            }elseif ($request->departamento != 'all' && $request->puesto != 'all'){

                    $personas = GTGTPersonas::where([
                        ['status', $request->status],
                        ['departamento', $request->departamento],
                        ['puesto', $request->puesto]                
                        ])
                        ->paginate(20000);

            }
        }

        $opt = 1;

        $departamento = GTGTPersonas::distinct()->get(['departamento']);

        $persona = $personas;

        if ($request->export == '1'){
            return view('gtgt.persona.data', compact('persona', 'departamento'))->with(['order'=>'apellidos', 'opt'=>$opt, 'search'=>1]); 
        } elseif ($request->export == '2'){
            return (new PersonaExport($personas))->download('personas.xlsx');
        }

}

//-------[[[REPORT]]]

public function report()
{
    $departamento = GTGTPersonas::select('departamento')->distinct()->get();
    $puesto = GTGTPersonas::select('puesto')->distinct()->get();

    return view('gtgt.persona.report', compact('puesto', 'departamento')); 
}

//-------[[[SEARCH]]]

public function search(Request $request)
{
    if ($request->departamento == 'nodata' && $request->puesto == 'nodata'){

            $persona = GTGTPersonas::where([
                [$request->search,'like','%'.$request->term.'%']               
                ])
                ->paginate(20000);

    } elseif ($request->departamento != 'nodata' && $request->puesto == 'nodata') {

            $persona = GTGTPersonas::where([
                [$request->search,'like','%'.$request->term.'%'],
                ['departamento','=', $request->departamento] 
                ])
                ->paginate(20000);
    } elseif ($request->departamento == 'nodata' && $request->puesto != 'nodata') {

        $persona = GTGTPersonas::where([
            [$request->search,'like','%'.$request->term.'%'],
            ['puesto','=', $request->puesto] 
            ])
            ->paginate(20000);
    }

        $opt = 1;

        $departamento = GTGTPersonas::distinct()->get(['departamento']);

        $puesto = GTGTPersonas::distinct()->get(['puesto']);

    return view('gtgt.persona.list', compact('persona', 'departamento', 'puesto'))->with(['order'=>'apellidos', 'opt'=>$opt, 'search'=>1]); 
}

//-------[[[DELETE]]]

public function delete($id)
{
    GTGTPersonas::find($id)->delete();

    return redirect("/gtlistpersona/2/apellidos/asc");
}

//-------[[[STORE]]]

public function store(GTGTPersonasFormRequest $request)
{
    $persona = new GTGTPersonas;

    if (request()->foto <> Null) {    
        $name = $request->mailgt;
        $ext = request()->foto->getClientOriginalExtension();
        $ext = strtolower($ext);
        $allname = $name.'.'.$ext;
        Storage::disk('public')->putFileAs('/', new File($request->foto), $allname);
    } elseif (request()->foto == Null) {
        $allname = "sin.foto.png";
    }

    $persona->nombres = $request->nombres;
    $persona->apellidos = $request->apellidos;
    $persona->departamento = $request->departamento;
    $persona->puesto = $request->puesto;
    $persona->telcel = $request->telcel;
    $persona->dpi = $request->dpi;
    $persona->direccion = $request->direccion;
    $persona->personaemergencia = $request->personaemergencia;
    $persona->telcelemergencia = $request->telcelemergencia;
    $persona->jefeinmediato = $request->jefeinmediato;
    $persona->mailgt = $request->mailgt;
    $persona->mailpe = $request->mailpe;
    $persona->status = $request->status;
    $persona->foto = $allname;
    $persona->save();

    return redirect("/gtlistpersona/1/apellidos/asc");
}

//-------[[[NEW]]]

public function new($back)
{
    return view('gtgt.persona.new')->with(['back'=>$back]);
}

//-------[[[ENABLE/DISABLE]]]

public function status($id, $status)
{
    $persona = GTGTPersonas::find($id);
        $persona->status = $status;
        $persona->save();

        return redirect("/gtlistpersona/$status/apellidos/asc");
}

//-------[[[UPDATE]]]

public function update(GTGTPersonasFormRequest $request)
{
    
    $persona = GTGTPersonas::find($request->id);
    
    if (request()->foto <> Null) {    
        $name = $request->mailgt;
        $ext = request()->foto->getClientOriginalExtension();
        $ext = strtolower($ext);
        $allname = $name.'.'.$ext;
        Storage::disk('public')->putFileAs('/', new File($request->foto), $allname);
    } elseif (request()->foto == Null) {
        $allname = $request->photo;
    }

        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->departamento = $request->departamento;
        $persona->puesto = $request->puesto;
        $persona->telcel = $request->telcel;
        $persona->dpi = $request->dpi;
        $persona->direccion = $request->direccion;
        $persona->personaemergencia = $request->personaemergencia;
        $persona->telcelemergencia = $request->telcelemergencia;
        $persona->jefeinmediato = $request->jefeinmediato;
        $persona->mailgt = $request->mailgt;
        $persona->mailpe = $request->mailpe;
        $persona->status = $request->status;
        $persona->foto = $allname;
        $persona->save();

        return redirect("/gteditpersona/$request->id/1")->with(['success'=>'El registro ha sido actualizado con éxito.']);
    
}

//-------[[[EDIT]]]

public function edit($id,$back)
{
    $persona = GTGTPersonas::find($id);

    return view('gtgt.persona.edit', compact('persona'))->with(['back'=>$back]); 
}

//-------[[[LIST]]]

public function list($status, $orden, $direction)
{
    $departamento = GTGTPersonas::distinct()->get(['departamento']);

    $puesto = GTGTPersonas::distinct()->get(['puesto']);
    
    $persona = GTGTPersonas::where([
        ['status','=',$status]
        ])
        ->orderBy($orden, $direction)
        ->paginate(20);

        $opt = $status;

    return view('gtgt.persona.list', compact('persona', 'departamento', 'puesto'))->with(['order'=>$orden, 'opt'=>$opt, 'search'=>0]); 
}

//-------[[[IMPORT]]]

public function import(Request $request)
{
    Excel::import(new PersonaImportModel, request()->file('list'));
    return redirect('/gtgtimportpersona')->with('success', 'La importación fue un éxito!!');
    
}

}
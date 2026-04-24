<?php

namespace App\Http\Controllers\GTGT;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\GTGTObject;
use App\Models\GTGTObjectCategory;
use App\Models\GTGTPersonas;
use App\Models\GTGTHardware;
use App\Http\Requests\GTGT\GTGTObjectFormRequest;
use App\Http\Requests\GTGT\GTGTObjectCategoryFormRequest;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use RegBitacora;

class ObjectController extends Controller
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

//-------[[[TEMPLATE]]]

public function createtemplate(Request $request)
{
    
    if ($request->id <> "X") {

        $objectcategory = GTGTObjectCategory::find($request->id);

        $personas = GTGTPersonas::active(1)->get();

        $oc = explode(',', $objectcategory->components);

        dd($personas);
    
    }else {

        return redirect("/gttemplateobject")->with('error', 'Se requiere seleccionar una categoría de adjunto o dato.');

    }

}

//-------[[[TEMPLATE]]]

public function template()
{
    $objectcategory = GTGTObjectCategory::get();
    return view('gtgt.object.template', compact('objectcategory'));
}

//-------[[[DELETE]]]

public function delete($id)
{
    $object = GTGTObject::find($id);

    if ($object->documento <> "ND") {
        Storage::disk('public')->delete($object->documento);
    }

    if ($object->foto <> "ND") {
        Storage::disk('public')->delete($object->foto);
    }

    $object->delete();

    return redirect("/gtinfopersona/$object->persona")->with('success', 'Se ha borrado un adjunto o dato.');
}

public function confirm($id)
{
    $data = array(
        'title' => "Verificar Borrado de Adjunto o Dato: $id",
        'icon' => 'select_all',
        'message' => "Esta a punto de borrar un adjunto o un dato, esta operación es de carácter permanente y el adjunto o dato será borrado definitivamente, tiene que tomar en cuenta que no hay ninguna forma de recuperar esta información, ni se hará respaldo antes de ser borrada, considere usar la herramienta de editar para cambiar o alterar de forma conveniente este adjunto o dato.",
        'cancel' => 'back',
        'confirm' => "/gtconfirmobject/$id",
        'delete' => 'Borrar Adjunto o Dato',
        'deleteicon' => 'delete_forever',
      );

      return \View::make('utils.confirmbasic', compact('data'));
}

//-------[[[EDIT]]]

public function edit(Request $request)
{
    $object = GTGTObject::find($request->id);

    if (request()->documento <> Null) {    
        $name = $object->categoria.'-'.rand(100000, 999999).'-'.$object->persona.'-'.rand(100000, 999999);
        $ext = request()->documento->getClientOriginalExtension();
        $ext = strtolower($ext);
        $allnamedocumento = $name.'.'.$ext;        
        Storage::disk('public')->delete($object->documento);
        Storage::disk('public')->putFileAs('/', new File($request->documento), $allnamedocumento);
    }else{
        $allnamedocumento = $object->documento;
    }

    if (request()->foto <> Null) {    
        $name = $request->categoria.'-'.rand(100000, 999999).'-'.$request->persona.'-'.rand(100000, 999999);
        $ext = request()->foto->getClientOriginalExtension();
        $ext = strtolower($ext);
        $allnamefoto = $name.'.'.$ext;
        Storage::disk('public')->delete($object->foto);
        Storage::disk('public')->putFileAs('/', new File($request->foto), $allnamefoto);
    }else{
        $allnamefoto = $object->foto;
    }

    if (request()->notas == Null){
        $notas = 'ND';
    } else {
        $notas = request()->notas;
    }

    if (request()->valor == Null){
        $valor = 0;
    } else {
        $valor = request()->valor;
    }

    if (request()->dato == Null){
        $dato = 'ND';
    } else {
        $dato = request()->dato;
    }

    if (request()->porcentaje == Null){
        $porcentaje = 0;
    } else {
        $porcentaje = request()->porcentaje;
    }

    $object->icono = $request->icono;
    $object->nombre = $request->nombre;
    $object->documento = $allnamedocumento;
    $object->foto = $allnamefoto;
    $object->notas = $notas;
    $object->dato = $dato;
    $object->valor = $valor;
    $object->porcentaje = $porcentaje;
    $object->save();
    
    return redirect("/gtinfopersona/$object->persona")->with('success', 'Se ha actualizado un adjunto o dato.');
}

//-------[[[VIEW]]]

public function view($id)
{
    $object = GTGTObject::find($id);
    $objectcategory = GTGTObjectCategory::where([
        ['id', $object->categoria]
        ])
        ->first();

        $oc = explode(',', $objectcategory->components); 

    return view('gtgt.object.edit', compact('oc', 'object'))->with(['categoria'=>$objectcategory->categoria]);
}

//-------[[[ADD]]]

public function add(GTGTObjectFormRequest $request)
{
    $object = new GTGTObject;

    if (request()->documento <> Null){
        $name = $request->categoria.'-'.rand(100000, 999999).'-'.$request->persona.'-'.rand(100000, 999999);
        $ext = request()->documento->getClientOriginalExtension();
        $ext = strtolower($ext);
        $allnamedocumento = $name.'.'.$ext;
        Storage::disk('public')->putFileAs('/', new File($request->documento), $allnamedocumento);
    }else{
        $allnamedocumento = 'ND';
    }

    if (request()->foto <> Null) {    
        $name = $request->categoria.'-'.rand(100000, 999999).'-'.$request->persona.'-'.rand(100000, 999999);
        $ext = request()->foto->getClientOriginalExtension();
        $ext = strtolower($ext);
        $allnamefoto = $name.'.'.$ext;
        Storage::disk('public')->putFileAs('/', new File($request->foto), $allnamefoto);
    }else{
        $allnamefoto = 'ND';

    }

    if (request()->notas == Null){
        $notas = 'ND';
    } else {
        $notas = request()->notas;
    }

    if (request()->dato == Null){
        $dato = 'ND';
    } else {
        $dato = request()->dato;
    }

    if (request()->valor == Null){
        $valor = 0;
    } else {
        $valor = request()->valor;
    }

    if (request()->porcentaje == Null){
        $porcentaje = 0;
    } else {
        $porcentaje = request()->porcentaje;
    }

    $object->categoria = $request->categoria;
    $object->persona = $request->persona;
    $object->icono = $request->icono;
    $object->nombre = $request->nombre;
    $object->documento = $allnamedocumento;
    $object->foto = $allnamefoto;
    $object->notas = $notas;
    $object->dato = $dato;
    $object->valor = $valor;
    $object->porcentaje = $porcentaje;
    $object->save();

    return redirect("/gtinfopersona/$request->persona")->with('success', 'Se ha creado un nuevo adjunto o dato.');
    
}

//-------[[[NEW]]]

public function new($categoria, $id)
{
    $objectcategory = GTGTObjectCategory::where([
        ['id', $categoria]
        ])
        ->first();

      $oc = explode(',', $objectcategory->components); 

      return view('gtgt.object.new', compact('oc'))->with(['persona'=>$id, 'categoria'=>$objectcategory->categoria, 'categoriaid'=>$objectcategory->id]);
}

//-------[[[NEW CATEGORY]]]

public function newcategory(GTGTObjectCategoryFormRequest $request)
{
    if ($request->notas == null){
        $notas = 0;
    }else {
        $notas = $request->notas;
    }

    if ($request->documento == null){
        $documento = 0;
    }else {
        $documento = $request->documento;
    }

    if ($request->foto == null){
        $foto = 0;
    }else {
        $foto = $request->foto;
    }

    if ($request->valor == null){
        $valor = 0;
    }else {
        $valor = $request->valor;
    }

    if ($request->porcentaje == null){
        $porcentaje = 0;
    }else {
        $porcentaje = $request->porcentaje;
    }

    if ($request->dato == null){
        $dato = 0;
    }else {
        $dato = $request->dato;
    }

    $check = $notas + $documento + $foto + $valor + $porcentaje + $dato;

    if ($check == 0) {
        return redirect('/gtnewobjectcategory')->with('error', 'Se requiere por lo menos escoger un campo para crear una Categoría de Objeto.');
    }

    $components = $notas.','.$documento.','.$foto.','.$valor.','.$porcentaje.','.$dato;

    $objectcategory = new GTGTObjectCategory;
    $objectcategory->categoria = $request->categoria;
    $objectcategory->components = $components;
    $objectcategory->save();   
    
    return redirect('/gtnewobjectcategory')->with('success', 'Se ha creado una nueva categoría de objetos.');
}

}
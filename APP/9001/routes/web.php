<?php

Route::view('/', 'welcome')->name('welcome');

Auth::routes();

Route::get('/userlogout', 'Auth\AdministrationController@logout');

///////////// [ Middleware: Active ] /////////////

Route::middleware(['active'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

});

///////////// [ Middleware: Root ] /////////////

Route::middleware(['root'])->group(function () {

    ///////////// [ User Administration ] /////////////

    Route::get('/userslist', 'Auth\AdministrationController@list');

    Route::get('/userlistdelete', 'Auth\AdministrationController@listdelete');

    Route::get('/usersearch/{search?}/and/{searchterm}', 'Auth\AdministrationController@search');

    Route::get('/usersearchredirect', function(){

        if (empty(Request::input('search'))) return redirect()->back();

        $searchterm = Request::input('searchterm');
        $search = Request::input('search');
        $route = "/usersearch/$search/and/$searchterm";
        return redirect($route);
    });

    Route::get('/usersoftdelete/{id?}/by/{author?}', 'Auth\AdministrationController@softdelete');
    Route::get('/usersoftundelete/{id?}/by/{author?}', 'Auth\AdministrationController@softundelete');

    Route::get('/userconfirmdestroy/{id}', 'Auth\AdministrationController@confirmdestroy');
    Route::get('/userdestroy/{id}', 'Auth\AdministrationController@destroy');

    Route::get('/userinactive/{id?}/by/{author?}', 'Auth\AdministrationController@inactive'); 
    Route::get('/useractive/{id?}/by/{author?}', 'Auth\AdministrationController@active');

    Route::get('/userchangepassword/{id?}/by/{author?}', 'Auth\AdministrationController@changepassword');
    Route::post('/userchangepassword/{id?}/by/{author?}', 'Auth\AdministrationController@storepassword');

    Route::get('/useredit/{id?}', 'Auth\AdministrationController@show');
    Route::post('/useredit/{id?}', 'Auth\AdministrationController@update');

    ///////////// [ Group Administration ] /////////////

    Route::view('/groupnew', 'auth.group.new');
    Route::post('/groupnew', 'Auth\GroupController@store');

    Route::get('/grouplist', 'Auth\GroupController@list');

    Route::get('/groupconfirmdestroy/{id}', 'Auth\GroupController@confirmdestroy');
    Route::get('/groupdestroy/{id}', 'Auth\GroupController@destroy');

    ///////////// [ Menu Administration ] /////////////

    Route::get('/menulist', 'Menu\MenuController@list');

    Route::get('/menumainmenus/{group?}', 'Menu\MenuController@mainmenus');
    Route::post('/menumainmenus/{group?}', 'Menu\MenuController@editmainmenus');

    Route::get('/menuconfirm/{id?}', 'Menu\MenuController@confirm');
    Route::get('/menudestroy/{id?}', 'Menu\MenuController@destroy');
    Route::get('/menudeleteline/{id?}/by/{parent?}', 'Menu\MenuController@destroyline');

    Route::get('/menusubmenu/{id?}', 'Menu\MenuController@submenus');
    Route::post('/menusubmenu/{id?}', 'Menu\MenuController@editsubmenus');
});

///////////// [ Middleware: Business School Participantes ] /////////////

Route::get('/participantenuevo/{id?}', 'GTBS\ParticipanteController@new');
Route::post('/participantenuevo/{id?}', 'GTBS\ParticipanteController@store');

///////////// [ Middleware: Business School Administration ] /////////////

Route::middleware(['gtbs'])->group(function () {

    Route::get('/gtbslist', 'GTBS\ParticipanteController@select');
    Route::post('/gtbslist', 'GTBS\ParticipanteController@list');

    Route::get('/gtreportpersonaformarketing', 'GTGT\PersonaController@report');
    Route::post('/gtreportpersonaformarketing', 'GTGT\PersonaController@excel');

});

///////////// [ Middleware: Grant Thornton Administration ] /////////////

Route::middleware(['gtgtit'])->group(function () {

    ///////////// [ PERSONA ] /////////////

    Route::view('/gtgtimportpersona', 'gtgt.persona.upload');
    Route::post('/gtgtimportpersona', 'GTGT\PersonaController@import');

    Route::get('/gtgtdownloadtemplatepersona', function () {
        return Storage::download("persona.xls");
    });

    Route::get('/gtlistpersona/{status?}/{orden?}/{direction?}', 'GTGT\PersonaController@list');
    Route::post('/gtlistpersona/{status?}/{orden?}/{direction?}', 'GTGT\PersonaController@search');

    Route::get('/gteditpersona/{id?}/{back?}', 'GTGT\PersonaController@edit');
    Route::post('/gteditpersona/{id?}/{back?}', 'GTGT\PersonaController@update');

    Route::get('/gtdisablepersona/{id?}/{status?}', 'GTGT\PersonaController@status');
    Route::get('/gtenablepersona/{id?}/{status?}', 'GTGT\PersonaController@status');
    Route::get('/gtdeletepersona/{id?}/{status?}', 'GTGT\PersonaController@status');
    Route::get('/gtundeletepersona/{id?}/{status?}', 'GTGT\PersonaController@status');
    Route::get('/gtdeleleteforeverpersona/{id?}', 'GTGT\PersonaController@delete');

    Route::get('/gtnewpersona/{back?}', 'GTGT\PersonaController@new');
    Route::post('/gtnewpersona/{back?}', 'GTGT\PersonaController@store');

    Route::get('/gtreportpersona', 'GTGT\PersonaController@report');
    Route::post('/gtreportpersona', 'GTGT\PersonaController@excel');

    ///////////// [ HARDWARE ] /////////////

    Route::view('/gtgtimporthardware', 'gtgt.hardware.upload');
    Route::post('/gtgtimporthardware', 'GTGT\HardwareController@import');

    Route::get('/gtgtdownloadtemplatehardware', function () {
        return Storage::download("hardware.xlsx");
    });

    Route::get('/gttoassignhardware/{id?}/{back?}', 'GTGT\HardwareController@toassign');
    Route::get('/gtaddhardware/{idpersona?}/{back?}/{idhardware?}', 'GTGT\HardwareController@add');
    Route::post('/gtaddhardware/{idpersona?}/{back?}/{idhardware?}', 'GTGT\HardwareController@store');

    Route::get('/gtremovehardware/{idpersona?}/{idhardware?}', 'GTGT\HardwareController@remove');
    Route::post('/gtremovehardware/{idpersona?}/{idhardware?}', 'GTGT\HardwareController@store');

    Route::get('/gtlosshardware/{idhardware?}', 'GTGT\HardwareController@loss');
    Route::post('/gtlosshardware/{idhardware?}', 'GTGT\HardwareController@store');

    Route::get('/gtinfopersona/{id?}', 'GTGT\HardwareController@info');

    Route::get('/gtlisthardware/{status?}', 'GTGT\HardwareController@list');
    Route::post('/gtlisthardware/{status?}', 'GTGT\HardwareController@search');

    Route::get('/gtnewhardware/{data?}', 'GTGT\HardwareController@data');
    Route::post('/gtnewhardware/{data?}', 'GTGT\HardwareController@new');

    Route::get('/gtviewhardware/{data?}/{id?}', 'GTGT\HardwareController@data');
    Route::post('/gtviewhardware/{data?}/{id?}', 'GTGT\HardwareController@update');

    Route::get('/gthistoryhardware/{idhardware?}', 'GTGT\HardwareController@history');

    Route::get('/gtcardhardware/{id?}/{status?}', 'GTGT\HardwareController@card');

    Route::get('/gtreporthardware', 'GTGT\HardwareController@report');
    Route::post('/gtreporthardware', 'GTGT\HardwareController@excel');

    ///////////// [ OBJECT ] /////////////

    Route::view('/gtnewobjectcategory', 'gtgt.object.new-category');
    Route::post('/gtnewobjectcategory', 'GTGT\ObjectController@newcategory');

    Route::get('/gtnewobject/{categoria?}/{id?}', 'GTGT\ObjectController@new');
    Route::post('/gtnewobject/{categoria?}/{id?}', 'GTGT\ObjectController@add');

    Route::get('/gteditobject/{id?}', 'GTGT\ObjectController@view');
    Route::post('/gteditobject/{id?}', 'GTGT\ObjectController@edit');

    Route::get('/gtdeleteobject/{id?}', 'GTGT\ObjectController@confirm');
    Route::get('/gtconfirmobject/{id?}', 'GTGT\ObjectController@delete');

    Route::get('/gttemplateobject', 'GTGT\ObjectController@template');
    Route::post('/gttemplateobject', 'GTGT\ObjectController@createtemplate');

});
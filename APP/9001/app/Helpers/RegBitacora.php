<?php

namespace App\Helpers;

use App\Bitacora;
use Illuminate\Support\Facades\DB;

class RegBitacora // = Bitacora
{
   public static function SetBitacora($status, $author, $app, $object, $note)
    {

        $bitacora = new Bitacora;
        $bitacora->status = $status;
        $bitacora->author = $author;
        $bitacora->app = $app;
        $bitacora->object = $object;
        $bitacora->note = $note;
        $bitacora->save();

    }
}

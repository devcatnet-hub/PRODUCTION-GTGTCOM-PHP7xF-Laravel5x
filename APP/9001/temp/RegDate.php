<?php

namespace App\Helpers;

use Carbon\Carbon;

class RegDate // = Bitacora
{
   public static function Int2Date($date)
    {

        $Y = substr("($date", 3, 2);
        $M = substr("($date", 5, 2);
        $D = substr("($date", 7, 2);
        $h = substr("($date", 9, 2);
        $m = substr("($date", 11, 2);

        return $D.'-'.$M.'-'.$Y.' '.$h.':'.$m;

    }

    public static function Int2Month($date)
     {

         $Y = substr("($date", 1, 4);
         $M = substr("($date", 5, 2);

         $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
         $m = intval($M);
         $mes = $meses[$m-1];

         return $mes.' de '.$Y;

     }


}

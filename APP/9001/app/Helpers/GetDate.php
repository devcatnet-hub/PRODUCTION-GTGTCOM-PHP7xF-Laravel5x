<?php

namespace App\Helpers;

use Carbon\Carbon;

class GetDate
{
      public static function DISO2GT($date)
      {

         $diso2gt = Carbon::createFromFormat('Y m d', $date);
         return $diso2gt->format('d/m/Y');

      }

      public static function DISO2Mes($date, $mode)
      {

          $diso2Mes = Carbon::createFromFormat('Y m d', $date);
          $diso2Otros = $diso2Mes;

          $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

          $diso2Mes = $meses[$diso2Mes->month - 1];

          switch ($mode) {
            case 'MES':
              $diso2Mes = strtoupper($diso2Mes);
              break;

            case 'Mes':
              $diso2Mes = ucwords($diso2Mes);
              break;

            case 'mes':
              $diso2Mes = $diso2Mes;
              break;

            case 'numero':
              $diso2Mes = $diso2Otros->month;
              $l = strlen($diso2Mes);

              if ($l == 1) {
                  $diso2Mes = '0'.$diso2Mes;
              }else {
                  $diso2Mes = $diso2Mes;
              }

              break;

            default:
              // code...
              break;
          }

          return $diso2Mes;

      }

      public static function DISO2Anio($date, $mode)
      {

         $diso2Anio = Carbon::createFromFormat('Y m d', $date);
         $diso2Otros = $diso2Anio;

         $diso2Anio = \NumeroALetras::convertir($diso2Anio->year);

         switch ($mode) {
           case 'anio':
             $diso2Anio = strtolower($diso2Anio);
             break;

           case 'Anio':
             $diso2Anio = ucwords(strtolower($diso2Anio));
             break;

           case 'ANIO':
             $diso2Anio = $diso2Anio;
             break;

           case 'numero':
             $diso2Anio = $diso2Otros->year;
             break;

           case 'aniocorto':
             $diso2Anio = substr($diso2Otros->year, 2, 2);
             break;

           default:
             // code...
             break;
         }

         return $diso2Anio;

      }

      public static function DISO2Dia($date, $mode)
      {

          $diso2Dia = Carbon::createFromFormat('Y m d', $date);
          $diso2Otros = $diso2Dia;

          $diso2Dia = \NumeroALetras::convertir($diso2Dia->day);

          switch ($mode) {
            case 'dia':
              $diso2Dia = strtolower($diso2Dia);
              break;

            case 'Dia':
              $diso2Dia = ucwords(strtolower($diso2Dia));
              break;

            case 'DIA':
              $diso2Dia = $diso2Dia;
              break;

            case 'numero':
              $diso2Dia = $diso2Otros->day;
              break;

            case 'diadelaño':
              $diso2Dia = $diso2Otros->dayOfYear;
              break;

            default:
              // code...
              break;
          }

          return $diso2Dia;

      }
}

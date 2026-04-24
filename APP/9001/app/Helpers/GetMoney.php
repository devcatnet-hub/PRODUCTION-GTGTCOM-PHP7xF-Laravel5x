<?php

namespace App\Helpers;

use Carbon\Carbon;

class GetMoney
{

      public static function NUM2Money($num, $mode)
      {

         $num2money = explode('.',$num);

         if (count($num2money) == 2) {
            $num2money = \NumeroALetras::convertir($num, 'QUETZALES', 'CENTAVOS');
         }else {
            $num2money = \NumeroALetras::convertir($num, 'QUETZALES', 'CENTAVOS'). ' EXACTOS';
         }

         if ($mode == 'MONEY') {
             $num2money = $num2money;
         } elseif ($mode == 'money') {
             $num2money = strtolower($num2money);
         } elseif ($mode == 'Money') {
             $num2money =  ucwords(strtolower($num2money));
         }

         return $num2money;

      }

      public static function NUM2MoneyCent($num, $mode)
      {

         $num2money = explode('.',$num);

         if (count($num2money) == 2) {
            $num2money = \NumeroALetras::convertir($num2money[0], 'QUETZALES CON', ' ').' '. $num2money[1].'/100';
         }else {
            $num2money = \NumeroALetras::convertir($num2money[0], 'QUETZALES', ' '). ' EXACTOS';
         }

         if ($mode == 'MONEY') {
             $num2money = $num2money;
         } elseif ($mode == 'money') {
             $num2money = strtolower($num2money);
         } elseif ($mode == 'Money') {
             $num2money =  ucwords(strtolower($num2money));
         }

         return $num2money;

      }


}

<?php

namespace App\Helpers;

class GetLetters
{

      public static function titleCase($string)
      {
          $delimiters = array(" ", "-", ".", "'");
          $exceptions = array("y", "o", "a", "e", "u", "de", "del", "al", "la", "el", "que");

          $string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
            foreach ($delimiters as $dlnr => $delimiter) {
            $words = explode($delimiter, $string);
            $newwords = array();
            foreach ($words as $wordnr => $word) {
                if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions)) {
                    $word = mb_strtoupper($word, "UTF-8");
                } elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions)) {
                    $word = mb_strtolower($word, "UTF-8");
                } elseif (!in_array($word, $exceptions)) {
                    $word = ucfirst($word);
                }
                array_push($newwords, $word);
            }
            $string = join($delimiter, $newwords);
          }

          return $string;

      }

      public static function DPI2Letras($DPI, $mode)
      {

          $DPI1 = trim(\NumeroALetras::convertir(substr($DPI, 0, 4)));
          $DPI2 = trim(\NumeroALetras::convertir(substr($DPI, 5, 5)));
          if (substr("$DPI", 11, 1) == 0) {
              $DPI3 = trim('CERO '.\NumeroALetras::convertir(substr("$DPI", 12, 4)));
          } else {
              $DPI3 = trim(\NumeroALetras::convertir(substr("$DPI", 11, 4)));
          }

          $dpi2letras =  $DPI1.', '.$DPI2.', '.$DPI3;

          if ($mode == 'LETRAS') {
              $dpi2letras = $dpi2letras;
          } elseif ($mode == 'letras') {
              $dpi2letras = strtolower($dpi2letras);
          } elseif ($mode == 'Letras') {
              $dpi2letras =  GetLetters::titleCase($dpi2letras);
          }

          return $dpi2letras;

      }

      public static function Abr2Tratamiento($abr, $mode)
      {
          switch ($abr) {
            case 'Srta.':
                $tratamiento = 'Señorita';
              break;
            case 'Sra.':
                $tratamiento = 'Señora';
              break;
            case 'Sr.':
                $tratamiento = 'Señor';
              break;
          }

          switch ($mode) {
            case 'ABR':
                  $tratamiento = strtoupper($tratamiento);
                break;
            case 'abr':
                  $tratamiento = strtolower($tratamiento);
                break;
            case 'Abr':
                  $tratamiento =  GetLetters::titleCase($tratamiento);
                break;
          }

          return $tratamiento;

      }



}

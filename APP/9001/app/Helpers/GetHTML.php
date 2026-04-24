<?php

namespace App\Helpers;

use App\Bitacora;
use Illuminate\Support\Facades\DB;

class GetHTML
{
    public static function Tooltip($text)
    {
        $tooltip = 'data-toggle="tooltip" data-placement="bottom" title="'.$text.'"';
        return $tooltip;
    }

    public static function Icons($icon)
    {
       $icon = '<i class="material-icons">'.$icon.'</i>';
       return $icon;
    }

    public static function CheckboxSelected($value)
    {
      switch ($value) {
        case '1':
            return 'checked';
          break;          
        }
    }

    public static function InlineText($text, $type, $cond, $comp)
    {
        if ($cond == $comp) {
            switch ($type) {
              case '<del>':
                  return '<del>'.$text.'</del>';
                break;

              case '<strong>':
                  return '<strong>'.$text.'</strong>';
                break;

              case '<mark>':
                  return '<mark>'.$text.'</mark>';
                break;

              case '<s>':
                  return '<s>'.$text.'</s>';
                break;

              case '<u>':
                  return '<u>'.$text.'</u>';
                break;

              case '<small>':
                  return '<small>'.$text.'</small>';
                break;

              case '<em>':
                  return '<em>'.$text.'</em>';
                break;

              case '<word>':
                  return $comp;
                break;

              case '<line>':
                  return '---';
                break;

              case '<empty>':
                  return ' ';
                break;
              }


        } else {
            return $text;
        }
    }
}

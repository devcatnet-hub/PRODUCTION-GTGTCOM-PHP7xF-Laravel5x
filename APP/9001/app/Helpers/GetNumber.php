<?php

namespace App\Helpers;

use App\Bitacora;
use Illuminate\Support\Facades\DB;

class GetNumber
{
   public static function Full($num, $full)
    {
        $l = strlen($num);
        $d = $full - $l;
        $full = str_repeat('0', $d).$num;

        return $full;
    }
}

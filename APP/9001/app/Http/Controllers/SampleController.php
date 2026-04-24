<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\Models\Pagare;
use App\Models\Calculo;

use Illuminate\Http\Request;
use App\Http\Requests\Pagare\PagareRequest;
use App\Http\Requests\Pagare\CalculoRequest;

use Carbon\Carbon;

use RegBitacora;

class SampleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

/////////////////////////////////////// STATIC \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public static function samplestatic()
    {
      
    }

/////////////////////////////////////// CALCULO \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

//-------[[[SAMPLE]]]

    public function samplefunction(){

    }

//-------[[[SAMPLE]]]------[[[STATIC]]]

            public static function samplestaticfunction()
            {
                
            }
}

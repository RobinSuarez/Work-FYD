<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tb_ar_lr_cust_controller extends Controller
{
    public function ar_aging_report(Request $r){
        
        $def_date = Carbon::now('UTC')->toDateString();
        $asof_date = $r['asof_date'];
        $data = DB::select('EXEC sp_ar_aging ?', array($asof_date ?? $def_date));
        return view('tb_ar_lr_cust.ar_aging_report', [
            'def_date'  => $def_date,
            'asof_date' => $asof_date,
            'data'      => $data
        ]);

    }
}

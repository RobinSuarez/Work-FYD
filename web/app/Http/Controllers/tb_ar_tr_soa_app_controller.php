<?php

namespace App\Http\Controllers;

use App\Models\tb_ar_tr_soa;
use App\Models\tb_ar_tr_soa_app;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tb_ar_tr_soa_app_controller extends Controller
{
    public function searcher($id){
        $soa_id = $id;
        $soa = tb_ar_tr_soa::findOrFail($soa_id);
        $soa_apps = DB::table('vw_ar_tr_soa_app_searcher')->where('client_id', '=', $soa->client_id)->get();
        $trans_status = $soa->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        return view('tb_ar_tr_soa_app.searcher', [
            'soa_id'       => $soa_id,
            'soa_apps'     => $soa_apps,
            'disabled'     => $disabled,
        ]);

    }

    public function store(Request $r){
        $soa_id = $r->soa_id;
        $ar_lr_cust_id_a = $r->ar_lr_cust_id ?? [];

        if(sizeof($ar_lr_cust_id_a) == 0){
            return redirect()->back()->with('alert', 'No items to submit!');
        }

        foreach($ar_lr_cust_id_a as $ar_lr_cust_id){
            $data2 = array(
                'soa_id' => $soa_id,
                'ar_lr_cust_id' =>  $ar_lr_cust_id,
                'created_at' => Carbon::now('UTC'),
                'updated_at' => Carbon::now('UTC')
            );
            tb_ar_tr_soa_app::insert($data2);
        }
        return redirect()->route('soas.edit', ['soa' => $soa_id])->with('status', 'Success!');

    }

    public function destroy(Request $r, $id){
        $soa_app = tb_ar_tr_soa_app::findOrFail($id);
        $soa_app->delete();
        return redirect()->back()->with('status', 'Success!');
    }
}

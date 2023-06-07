<?php

namespace App\Http\Controllers;

use App\Models\tb_ar_tr_or;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tb_ar_tr_or_app_controller extends Controller
{
    public function searcher($id) {
        $or = tb_ar_tr_or::findOrFail($id);
        $or_apps = DB::select('exec sp_ar_tr_or_app :or_id',[':or_id' => $id]);
        $trans_status = $or->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        return view('tb_ar_tr_or_app.searcher', [
            'or'           => $or,
            'or_id'        => $id,
            'or_apps'      => $or_apps,
            'disabled'     => $disabled,
        ]);
    }

    public function merge(Request $r){
        $ids = $r->id;
        $or_id = $r->or_id;
        $or_apps = $r->amount_applied;
        $ar_lr_cust_ids = $r->ar_lr_cust_id;
        $remarks = $r->remarks;
        // dd($r);
        foreach ($or_apps as $i => $or_app) {
            //INSERT
            $num_or_app = preg_replace('/(?<=\d),(?=\d)/','',$or_app);
            if($num_or_app != 0 && ($ids[$i] ?? 0) == 0){
                DB::table('tb_ar_tr_or_app')->insert([
                    'or_id'             => $or_id,
                    'ar_lr_cust_id'     => $ar_lr_cust_ids[$i],
                    'amount_applied'    => $num_or_app,
                    'remarks'           => $remarks[$i],
                    'created_at'        => Carbon::now('UTC'),
                    'updated_at'        => Carbon::now('UTC'),
                ]);
            }
            //UPDATE
            if($num_or_app != 0 && ($ids[$i] ?? 0) != 0){
                DB::table('tb_ar_tr_or_app')->where('id', $ids[$i])
                ->update([
                    'amount_applied'    => $num_or_app,
                    'remarks'           => $remarks[$i],
                    'updated_at'        => Carbon::now('UTC')
                ]);
            }
            //DELETE
            if($num_or_app == 0 && ($ids[$i] ?? 0) != 0){
                DB::table('tb_ar_tr_or_app')->where('id', $ids[$i])->delete();
            }
            
        }

        return redirect()->route('or-apps.searcher', ['id' => $or_id])->with('status', 'Success!');
    }

}
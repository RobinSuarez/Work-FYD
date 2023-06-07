<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_ar_tr_or_pay_check_request;
use App\Models\tb_ar_tr_or;
use App\Models\tb_ar_tr_or_pay_check;
use App\Models\tb_crm_mf_bank;
use Carbon\Carbon;
use Illuminate\Http\Request;

class tb_ar_tr_or_pay_check_controller extends Controller
{
    public function create($id){
        $or_id = $id;
        $banks = tb_crm_mf_bank::where('is_active', '=', 1)->get();
        $def_date = Carbon::now('UTC')->toDateString();
        return view('tb_ar_tr_or_pay_check.create', [
            'or_id'     => $or_id,
            'banks'     => $banks,
            'def_date'  => $def_date,
        ]);
    }

    public function store(tb_ar_tr_or_pay_check_request $r){
        $or_pay_check = new tb_ar_tr_or_pay_check();
        $validatedData = $r->validated();
        $or_pay_check->fill($validatedData);
        $or_pay_check->save();
        return redirect()->route('ors.edit', ['or' => $or_pay_check->or_id])->with('status', 'Success!');
    }
    public function edit($id){
        $or_pay_check = tb_ar_tr_or_pay_check::findOrFail($id);
        $or = tb_ar_tr_or::findOrFail($or_pay_check->or_id);
        $trans_status = $or->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        $banks = tb_crm_mf_bank::where('is_active', '=', 1)->get();
        return view('tb_ar_tr_or_pay_check.edit', [
            'or_pay_check'          => $or_pay_check,
            'banks'                => $banks,
            'disabled'             => $disabled,
        ]);
    }

    public function update(tb_ar_tr_or_pay_check_request $r, $id){
        $or_pay_check = tb_ar_tr_or_pay_check::findOrFail($id);
        $validatedData = $r->validated();
        $or_pay_check->fill($validatedData);
        $or_pay_check->update();
        return redirect()->route('ors.edit', [ 'or' => $or_pay_check->or_id])->with('status', 'Success!');
    }

    public function show($id){
        $or_pay_check = tb_ar_tr_or_pay_check::findOrFail($id);
        $or = tb_ar_tr_or::findOrFail($or_pay_check->or_id);
        $trans_status = $or->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        $banks = tb_crm_mf_bank::where('is_active', '=', $or_pay_check->bank_id)->get();
        return view('tb_ar_tr_or_pay_check.show', [
            'or_pay_check'          => $or_pay_check,
            'disabled'              => $disabled,
            'banks'                 => $banks
        ]);
    } 

    public function destroy(Request $r, $id){
        $or_pay_check = tb_ar_tr_or_pay_check::findOrFail($id);
        $or_pay_check->delete();
        return redirect()->back()->with('status', 'Success!');
        
    }
}

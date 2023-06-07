<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_ar_tr_or_pay_cash_request;
use App\Models\tb_ar_tr_or;
use App\Models\tb_ar_tr_or_pay_cash;
use Carbon\Carbon;
use Illuminate\Http\Request;

class tb_ar_tr_or_pay_cash_controller extends Controller
{
    public function create($id){
        $or_id = $id;
        $def_date = Carbon::now('UTC')->toDateString();
        return view('tb_ar_tr_or_pay_cash.create', [
            'or_id'     => $or_id,
            'def_date'  => $def_date,
        ]);
    }

    public function store(tb_ar_tr_or_pay_cash_request $r){
        $or_pay_cash = new tb_ar_tr_or_pay_cash();
        $validatedData = $r->validated();
        $or_pay_cash->fill($validatedData);
        $or_pay_cash->save();
        return redirect()->route('ors.edit', ['or' => $or_pay_cash->or_id])->with('status', 'Success!');
    }
    public function edit($id){
        $or_pay_cash = tb_ar_tr_or_pay_cash::findOrFail($id);
        $or = tb_ar_tr_or::findOrFail($or_pay_cash->or_id);
        $trans_status = $or->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        return view('tb_ar_tr_or_pay_cash.edit', [
            'or_pay_cash'          => $or_pay_cash,
            'disabled'             => $disabled,
        ]);
    }

    public function update(tb_ar_tr_or_pay_cash_request $r, $id){
        $or_pay_cash = tb_ar_tr_or_pay_cash::findOrFail($id);
        $validatedData = $r->validated();
        $validatedData['amount'] = preg_replace('/(?<=\d),(?=\d)/','',$validatedData['amount']);
        $or_pay_cash->fill($validatedData);
        $or_pay_cash->update();
        return redirect()->route('ors.edit', [ 'or' => $or_pay_cash->or_id])->with('status', 'Success!');
    }

    public function show($id){
        $or_pay_cash = tb_ar_tr_or_pay_cash::findOrFail($id);
        $or = tb_ar_tr_or::findOrFail($or_pay_cash->or_id);
        $trans_status = $or->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        return view('tb_ar_tr_or_pay_cash.show', [
            'or_pay_cash'          => $or_pay_cash,
            'disabled'                  => $disabled
        ]);
    } 

    public function destroy(Request $r, $id){
        $or_pay_cash = tb_ar_tr_or_pay_cash::findOrFail($id);
        $or_pay_cash->delete();
        return redirect()->back()->with('status', 'Success!');
        
    }
}

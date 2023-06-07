<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_sales_tr_contract_proposal_request;
use App\Models\tb_sales_tr_contract;
use App\Models\tb_sales_tr_contract_proposal;
use App\Models\tb_sales_tr_proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tb_sales_tr_contract_proposal_controller extends Controller
{
    public function create($id){
        $contract_id = $id;
        $proposals = DB::table('vw_sales_tr_contract_proposal_sr')->get();
        return view('tb_sales_tr_contract_proposal.create', [
            'contract_id'   => $contract_id,
            'proposals'     => $proposals,
        ]);
    }

    public function store(tb_sales_tr_contract_proposal_request $r){
        $contract_proposal = new tb_sales_tr_contract_proposal();
        $validatedData = $r->validated();
        $contract_proposal->fill($validatedData);
        $contract_proposal->save();
        return redirect()->route('contracts.edit', ['contract' => $contract_proposal->contract_id])->with('status', 'Success!');
    }
    public function edit($id){
        $contract_proposal = tb_sales_tr_contract_proposal::findOrFail($id);
        $contract = tb_sales_tr_contract::findOrFail($contract_proposal->contract_id);
        $trans_status = $contract->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        $proposal_a = DB::table('vw_sales_tr_contract_proposal_sr');
        $proposal_b = tb_sales_tr_proposal::select('id', 'no as name')->where('id', '=', $contract_proposal->proposal_id)->union($proposal_a)->get();
        $proposals = $proposal_b;
        return view('tb_sales_tr_contract_proposal.edit', [
            'contract_proposal'        => $contract_proposal,
            'proposals'                => $proposals,
            'disabled'                 => $disabled,
        ]);
    }

    public function update(tb_sales_tr_contract_proposal_request $r, $id){
        $contract_proposal = tb_sales_tr_contract_proposal::findOrFail($id);
        $validatedData = $r->validated();
        $contract_proposal->fill($validatedData);
        $contract_proposal->update();
        return redirect()->route('contracts.edit', [ 'contract' => $contract_proposal->contract_id])->with('status', 'Success!');
    }

    public function show($id){
        $contract_proposal = tb_sales_tr_contract_proposal::findOrFail($id);
        $contract = tb_sales_tr_contract::findOrFail($contract_proposal->contract_id);
        $trans_status = $contract->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        $proposals = tb_sales_tr_proposal::select('id', 'no as name')->where('id', '=', $contract_proposal->proposal_id)->get();
        return view('tb_sales_tr_contract_proposal.show', [
            'contract_proposal'         => $contract_proposal,
            'proposals'                 => $proposals,
            'disabled'                  => $disabled
        ]);
    } 

    public function destroy(Request $r, $id){
        $contract_proposal = tb_sales_tr_contract_proposal::findOrFail($id);
        $contract_proposal->delete();
        return redirect()->back()->with('status', 'Success!');
        
    }
}

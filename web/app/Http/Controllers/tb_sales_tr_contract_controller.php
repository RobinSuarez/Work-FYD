<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_sales_tr_contract_request;
use App\Models\tb_crm_mf_status;
use App\Models\tb_sales_tr_contract;
use App\Models\tb_sales_tr_contract_proposal;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class tb_sales_tr_contract_controller extends Controller
{
    public function index(Request $r){
        $no = $r['no'];
        $contracts = tb_sales_tr_contract::join('tb_crm_mf_status', 'tb_crm_mf_status.id', 'tb_sales_tr_contract.status_id')
                        ->when(isset($no), function ($q) use ($no){
                            return $q->where('tb_sales_tr_contract.no', 'like', '%'.$no.'%');})
                        ->select('tb_sales_tr_contract.id', 'tb_sales_tr_contract.date', 'tb_sales_tr_contract.no', 'tb_crm_mf_status.name as status',
                            'tb_sales_tr_contract.remarks')
                        ->sortable()
                        ->paginate(env('ROW_COUNT'));
        return view('tb_sales_tr_contract.index', ['contracts' => $contracts]);
    }

    public function create(){
        $statuses = tb_crm_mf_status::where('is_active', '=', 1)->get();
        $def_date = Carbon::now('UTC')->toDateString();
        return view('tb_sales_tr_contract.create', [
            'statuses' => $statuses,
            'def_date' => $def_date,
        ]);
    }

    public function store(tb_sales_tr_contract_request $r){
        $validatedData = $r->validated();
        switch ($r['status']) {
            case 'save':
                $validatedData['status_id'] = 1;
                break;
            case 'post':
                $validatedData['status_id'] = 2;
                break;
            default:
                throw ValidationException::withMessages(['status' => 'Status not supported']);
                break;
        }
        $contract = new tb_sales_tr_contract();
        $contract->fill($validatedData);
        $contract->save();
        return redirect()->route('contracts.show', ['contract' => $contract->id])->with('status', 'Success!');
    }

    public function show($id){
        $contract = tb_sales_tr_contract::findOrFail($id);
        $statuses = tb_crm_mf_status::where('id', '=', $contract->status_id)->get();
        $contract_proposals = tb_sales_tr_contract_proposal::join('tb_sales_tr_proposal', 'tb_sales_tr_proposal.id', 'tb_sales_tr_contract_proposal.proposal_id')
                                ->select('tb_sales_tr_contract_proposal.id', 'tb_sales_tr_contract_proposal.contract_id', 'tb_sales_tr_contract_proposal.seq', 'tb_sales_tr_proposal.no as proposal')
                                ->where('contract_id', '=', $contract->id)->get();
        return view('tb_sales_tr_contract.show', [
            'contract'              => $contract,
            'contract_proposals'    => $contract_proposals,
            'statuses'              => $statuses,
        ]);
    }

    public function edit($id){
        $contract = tb_sales_tr_contract::findOrFail($id);
        $trans_status = $contract->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }

        $contract_proposals = tb_sales_tr_contract_proposal::join('tb_sales_tr_proposal', 'tb_sales_tr_proposal.id', 'tb_sales_tr_contract_proposal.proposal_id')
                                ->select('tb_sales_tr_contract_proposal.id', 'tb_sales_tr_contract_proposal.contract_id', 'tb_sales_tr_contract_proposal.seq', 'tb_sales_tr_proposal.no as proposal')
                                ->where('contract_id', '=', $contract->id)->get();
        $statuses = tb_crm_mf_status::where('is_active', '=', 1)->get();
        return view ('tb_sales_tr_contract.edit', [
            'contract'              => $contract,
            'contract_proposals'    => $contract_proposals,
            'disabled'              => $disabled,
            'statuses'              => $statuses,
        ]);
    }

    public function update(tb_sales_tr_contract_request $r, $id){
        $contract = tb_sales_tr_contract::findOrFail($id);
        $validatedData = $r->validated();
        switch ($r['status']) {
            case 'save':
                $validatedData['status_id'] = 1;
                break;
            case 'post':
                $validatedData['status_id'] = 2;
                break;
            case 'cancel':
                $validatedData['status_id'] = 3;
                break;
            default:
                throw ValidationException::withMessages(['status' => 'Status not supported']);
                break;
        }
        $contract->fill($validatedData);
        $contract->update();
        if ($r['status'] == 'save') {
            return redirect()->route('contracts.edit', ['contract' => $contract->id]);
        }
        return redirect()->route('contracts.show', ['contract' => $contract->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $contract = tb_sales_tr_contract::findOrFail($id);
        $contract->delete();
        return redirect()->route('contracts.index')->with('status', 'Success!');
    }
}

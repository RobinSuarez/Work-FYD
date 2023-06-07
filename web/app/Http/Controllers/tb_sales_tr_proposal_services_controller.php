<?php

namespace App\Http\Controllers;

use App\Models\tb_crm_mf_service;
use Illuminate\Http\Request;

use App\Models\tb_sales_tr_proposal_services;
use App\Http\Requests\tb_sales_tr_proposal_services_request;
use App\Models\tb_crm_mf_uom;
use App\Models\tb_sales_tr_proposal;
use App\Models\tb_sales_tr_proposal_services_term;

class tb_sales_tr_proposal_services_controller extends Controller
{ 
    public function create($id){
        $proposal_id = $id;
        $services = tb_crm_mf_service::where('is_active', '=', 1)->get();
        $uoms = tb_crm_mf_uom::where('is_active', '=', 1)->get();
        return view('tb_sales_tr_proposal_services.create', [
            'proposal_id'   => $proposal_id,
            'services' => $services,
            'uoms'  => $uoms,
        ]);
    }

    public function store(tb_sales_tr_proposal_services_request $r){
        $proposal_service = new tb_sales_tr_proposal_services();
        $validatedData = $r->validated();
        $proposal_service->fill($validatedData);
        $proposal_service->save();
        return redirect()->route('proposals.edit', ['proposal' => $proposal_service->proposal_id])->with('status', 'Success!');
    }
    public function edit($id){
        $proposal_service = tb_sales_tr_proposal_services::findOrFail($id);
        $proposal = tb_sales_tr_proposal::findOrFail($proposal_service->proposal_id);
        $trans_status = $proposal->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        $services = tb_crm_mf_service::where('is_active', '=', 1)->get();
        $uoms = tb_crm_mf_uom::where('is_active', '=', 1)->get();
        $proposal_service_terms = tb_sales_tr_proposal_services_term::where('proposal_services_id', '=', $proposal_service->id)->get();
        return view('tb_sales_tr_proposal_services.edit', [
            'proposal_service'          => $proposal_service,
            'services'                  => $services,
            'uoms'                      => $uoms,
            'disabled'                  => $disabled,
            'proposal_service_terms'    => $proposal_service_terms
        ]);
    }

    public function update(tb_sales_tr_proposal_services_request $r, $id){
        $proposal_service = tb_sales_tr_proposal_services::findOrFail($id);
        $validatedData = $r->validated();
        $proposal_service->fill($validatedData);
        $proposal_service->update();
        return redirect()->route('proposals.edit', [ 'proposal' => $proposal_service->proposal_id])->with('status', 'Success!');
    }

    public function show($id){
        $proposal_service = tb_sales_tr_proposal_services::findOrFail($id);
        $proposal = tb_sales_tr_proposal::findOrFail($proposal_service->proposal_id);
        $trans_status = $proposal->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        $services = tb_crm_mf_service::where('id', '=', $proposal_service->service_id)->get();
        $uoms = tb_crm_mf_uom::where('id', '=', $proposal_service->uom_id)->get();
        $proposal_service_terms = tb_sales_tr_proposal_services_term::where('proposal_services_id', '=', $proposal_service->id)->get();
        return view('tb_sales_tr_proposal_services.show', [
            'proposal_service'          => $proposal_service,
            'services'                  => $services,
            'uoms'                      => $uoms,
            'proposal_service_terms'    => $proposal_service_terms,
            'disabled'                  => $disabled
        ]);
    } 

    public function destroy(Request $r, $id){
        $proposal_service = tb_sales_tr_proposal_services::findOrFail($id);
        $proposal_service->delete();
        return redirect()->back()->with('status', 'Success!');
        
    }
}

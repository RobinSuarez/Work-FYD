<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_sales_tr_proposal_request;
use App\Models\tb_sales_tr_proposal;
use App\Models\tb_crm_mf_client;
use App\Models\tb_crm_mf_company;
use App\Models\tb_crm_mf_salesman;
use App\Models\tb_crm_mf_status;
use App\Models\tb_crm_mf_tax_type;
use App\Models\tb_sales_tr_proposal_services;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;


class tb_sales_tr_proposal_controller extends Controller
{
    public function index(Request $r){
        $no = $r['no'];
        $proposals = tb_sales_tr_proposal::join('tb_crm_mf_client', 'tb_crm_mf_client.id', 'tb_sales_tr_proposal.client_id')
                                ->join('tb_crm_mf_tax_type', 'tb_crm_mf_tax_type.id', 'tb_sales_tr_proposal.tax_type_id')
                                ->join('tb_crm_mf_status', 'tb_crm_mf_status.id', 'tb_sales_tr_proposal.status_id')
                                ->leftJoin('tb_crm_mf_company', 'tb_crm_mf_company.id', 'tb_sales_tr_proposal.company_id')
                                ->when(isset($no), function ($q) use ($no){
                                    return $q->where('tb_sales_tr_proposal.no', 'like', '%'.$no.'%');})
                                ->select('tb_sales_tr_proposal.id', 'tb_sales_tr_proposal.date', 'tb_sales_tr_proposal.no', 'tb_crm_mf_client.name as client', 
                                    'tb_sales_tr_proposal.version_id', 'tb_sales_tr_proposal.amount', 'tb_crm_mf_tax_type.name as tax_type', 'tb_crm_mf_status.name as status',
                                    'tb_crm_mf_company.name as company',
                                    'tb_sales_tr_proposal.remarks')
                                ->sortable()
                                ->paginate(env('ROW_COUNT'));
        return view('tb_sales_tr_proposal.index', ['proposals' => $proposals]);
    }

    public function create(){
        $clients = tb_crm_mf_client::where('is_active', '=', 1)->get();
        $salesmen = tb_crm_mf_salesman::where('is_active', '=', 1)->get();
        $companies = tb_crm_mf_company::where('is_active', '=', 1)->get();
        $tax_types = tb_crm_mf_tax_type::where('is_active', '=', 1)->get();
        $statuses = tb_crm_mf_status::where('is_active', '=', 1)->get();
        return view('tb_sales_tr_proposal.create', [
            'clients' => $clients,
            'salesmen'  => $salesmen,
            'companies' => $companies,
            'tax_types' => $tax_types,
            'statuses' => $statuses
        ]);
    }

    public function store(tb_sales_tr_proposal_request $r){
        $validatedData = $r->validated();
        switch ($r                                                                                                                                                                                                                                                                                                                                                                                                          ['status']) {
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
        $proposal = new tb_sales_tr_proposal();
        $proposal->fill($validatedData);
        $proposal->save();
        return redirect()->route('proposals.show', ['proposal' => $proposal->id])->with('status', 'Success!');
    }

    public function show($id){
        $proposal = tb_sales_tr_proposal::findOrFail($id);
        $clients = tb_crm_mf_client::where('id', '=', $proposal->client_id)->get();
        $salesmen = tb_crm_mf_salesman::where('id', '=', $proposal->client_id)->get();
        $tax_types = tb_crm_mf_tax_type::where('id', '=', $proposal->tax_type_id)->get();
        $companies = tb_crm_mf_company::where('id', '=', $proposal->company_id)->get();
        $statuses = tb_crm_mf_status::where('id', '=', $proposal->status_id)->get();
        $proposal_services = tb_sales_tr_proposal_services::join('tb_crm_mf_service', 'tb_crm_mf_service.id', 'tb_sales_tr_proposal_services.service_id')
                                                            ->join('tb_crm_mf_uom', 'tb_crm_mf_uom.id', 'tb_sales_tr_proposal_services.uom_id')
                                                            ->where('tb_sales_tr_proposal_services.proposal_id', '=', $proposal->id)
                                                            ->select('tb_sales_tr_proposal_services.id', 'tb_sales_tr_proposal_services.service_id', 'tb_sales_tr_proposal_services.qty', 'tb_sales_tr_proposal_services.price', 
                                                                    'tb_sales_tr_proposal_services.total', 'tb_sales_tr_proposal_services.with_vat', 'tb_sales_tr_proposal_services.seq', 'tb_crm_mf_service.name as service', 'tb_crm_mf_uom.name as uom')
                                                            ->get();
        return view('tb_sales_tr_proposal.show', [
            'proposal'  => $proposal,
            'clients'   => $clients,
            'salesmen'  => $salesmen,
            'companies' => $companies,
            'tax_types' => $tax_types,
            'statuses'  => $statuses,
            'proposal_services' => $proposal_services
        ]);
    }

    public function edit($id){
        $proposal = tb_sales_tr_proposal::findOrFail($id);
        $trans_status = $proposal->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        $clients = tb_crm_mf_client::where('is_active', '=', 1)->get();
        $salesmen = tb_crm_mf_salesman::where('is_active', '=', 1)->get();
        $companies = tb_crm_mf_company::where('is_active', '=', 1)->get();
        $tax_types = tb_crm_mf_tax_type::where('is_active', '=', 1)->get();
        $statuses = tb_crm_mf_status::where('is_active', '=', 1)->get();
        $proposal_services = tb_sales_tr_proposal_services::join('tb_crm_mf_service', 'tb_crm_mf_service.id', 'tb_sales_tr_proposal_services.service_id')
                                                            ->join('tb_crm_mf_uom', 'tb_crm_mf_uom.id', 'tb_sales_tr_proposal_services.uom_id')
                                                            ->where('tb_sales_tr_proposal_services.proposal_id', '=', $proposal->id)
                                                            ->select('tb_sales_tr_proposal_services.id', 'tb_sales_tr_proposal_services.service_id', 'tb_sales_tr_proposal_services.qty', 'tb_sales_tr_proposal_services.price', 
                                                                    'tb_sales_tr_proposal_services.total', 'tb_sales_tr_proposal_services.with_vat', 'tb_sales_tr_proposal_services.seq', 'tb_crm_mf_service.name as service', 'tb_crm_mf_uom.name as uom')
                                                            ->get();
        // dd($proposal_services);
        return view ('tb_sales_tr_proposal.edit', [
            'proposal'          => $proposal,
            'disabled'          => $disabled,
            'clients'           => $clients,
            'salesmen'          => $salesmen,
            'companies'         => $companies,
            'tax_types'         => $tax_types,
            'statuses'          => $statuses,
            'proposal_services' => $proposal_services
        ]);
    }

    public function update(tb_sales_tr_proposal_request $r, $id){
        $proposal = tb_sales_tr_proposal::findOrFail($id);
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
        $proposal->fill($validatedData);
        $proposal->update();
        if ($r['status'] == 'save') {
            return redirect()->route('proposals.edit', ['proposal' => $proposal->id]);
        }
        return redirect()->route('proposals.show', ['proposal' => $proposal->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $proposal = tb_sales_tr_proposal::findOrFail($id);
        $proposal->delete();
        return redirect()->route('proposals.index')->with('status', 'Success!');
    }
}

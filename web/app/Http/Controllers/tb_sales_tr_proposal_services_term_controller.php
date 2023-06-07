<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_sales_tr_proposal_services_term_request;
use App\Models\tb_sales_tr_proposal_services_term;
use App\Models\tb_sales_tr_proposal;
use App\Models\tb_sales_tr_proposal_services;
use Carbon\Carbon;
use Illuminate\Http\Request; 

class tb_sales_tr_proposal_services_term_controller extends Controller
{
    public function create($id){
        $def_date = Carbon::now('UTC')->toDateString();
        $proposal_service_id = $id;
        return view('tb_sales_tr_proposal_services_term.create', [
            'proposal_service_id'   => $proposal_service_id,
            'def_date'              => $def_date
        ]);
    }

    public function store(tb_sales_tr_proposal_services_term_request $r){
        $proposal_services_term = new tb_sales_tr_proposal_services_term();
        $validatedData = $r->validated();
        $proposal_services_term->fill($validatedData);
        $proposal_services_term->save();
        // $this->update_proposal_service_total($proposal_services_term->proposal_services_id);
        return redirect()->route('proposal-services.edit', [
            'id' => $proposal_services_term->proposal_services_id
        ])->with('status', 'Success!');
    }
    public function edit($id){
        $proposal_services_term = tb_sales_tr_proposal_services_term::findOrFail($id);
        $proposal_services = tb_sales_tr_proposal_services::findOrFail($proposal_services_term->proposal_services_id);
        $proposal = tb_sales_tr_proposal::findOrFail($proposal_services->proposal_id);
        $status_id = $proposal->status_id;
        return view('tb_sales_tr_proposal_services_term.edit', [
            'proposal_services_term'          => $proposal_services_term,
            'status_id'                        => $status_id
        ]);
    }

    public function update(tb_sales_tr_proposal_services_term_request $r, $id){
        $proposal_services_term = tb_sales_tr_proposal_services_term::findOrFail($id);
        $validatedData = $r->validated();
        $proposal_services_term->fill($validatedData);
        $proposal_services_term->update();
        // $this->update_proposal_service_total($proposal_services_term->proposal_services_id);
        return redirect()->route('proposal-services.edit', [ 
            'id' => $proposal_services_term->proposal_services_id
        ])->with('status', 'Success!');
    }

    public function show($id){
        $proposal_services_term = tb_sales_tr_proposal_services_term::findOrFail($id);
        $proposal_services = tb_sales_tr_proposal_services::findOrFail($proposal_services_term->proposal_services_id);
        $proposal = tb_sales_tr_proposal::findOrFail($proposal_services->proposal_id);
        $status_id = $proposal->status_id;
        return view('tb_sales_tr_proposal_services_term.show', [
            'proposal_services_term'            => $proposal_services_term,
            'status_id'                         => $status_id
        ]);
    } 

    public function destroy(Request $r, $id){
        $proposal_services_term = tb_sales_tr_proposal_services_term::findOrFail($id);
        $proposal_service_id = $proposal_services_term->proposal_services_id;
        $proposal_services_term->delete();
        // $this->update_proposal_service_total($proposal_service_id);
        // return redirect()->back()->with('status', 'Success!');
        return redirect()->route('proposal-services.edit', ['id' => $proposal_service_id])->with('status', 'Success!');
    }

    // private function update_proposal_amount($proposal_id){
    //     $proposal = tb_sales_tr_proposal::findOrFail($proposal_id);
    //     $proposal_services = tb_sales_tr_proposal_services::where('proposal_id', $proposal_id)->get();
    //     $total = $proposal_services->sum('total');
    //     $proposal->update([
    //         'amount' => $total,
    //     ]);
    // }

    // private function update_proposal_service_total($proposal_service_id){
          
    //     $proposal_service = tb_sales_tr_proposal_services::findOrFail($proposal_service_id);
    //     return redirect()->back()->with('status', 'Hello!'); 
    //     $proposal_services_terms = tb_sales_tr_proposal_services_term::where('proposal_services_id', $proposal_service_id)->get();
    //     $amount = $proposal_services_terms->sum('amount');
    //     $proposal_service->update([
    //         'amount' => $amount
    //     ]);
    //     // $this->update_proposal_amount($proposal_service->proposal_id);
    // }   
}

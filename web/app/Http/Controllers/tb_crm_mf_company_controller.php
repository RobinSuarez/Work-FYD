<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_crm_mf_company;
use App\Http\Requests\tb_crm_mf_company_request;

class tb_crm_mf_company_controller extends Controller
{ 
    public function index(Request $r){
        $name = $r['name'];
        $companies = tb_crm_mf_company::when(isset($name), function ($q) use ($name){
                        return $q->where('tb_crm_mf_company.name', 'like', '%'.$name.'%');})
                                ->sortable(['id', 'code', 'name', 'is_active'])
                                ->paginate(env('ROW_COUNT', 10));
        return view('tb_crm_mf_company.index', ['companies' => $companies]);

    }

    public function create(){
        return view('tb_crm_mf_company.create');
    }

    public function store(tb_crm_mf_company_request $r){
        $validatedData = $r->validated();
        $company = new tb_crm_mf_company();
        $company->fill($validatedData);
        $company->save();
        return redirect()->route('companies.show', ['company' => $company->id])->with('status', 'Success!');
    }

    public function show($id){
        $company = tb_crm_mf_company::findOrFail($id);
        return view('tb_crm_mf_company.show', ['company' => $company]);
    }

    public function edit($id){
        $company = tb_crm_mf_company::findOrFail($id);
        return view ('tb_crm_mf_company.edit', [
            'company' => $company,
        ]);
    }

    public function update(tb_crm_mf_company_request $r, $id){
        $company = tb_crm_mf_company::findOrFail($id);
        $validatedData = $r->validated();
        $company->fill($validatedData);
        $company->update();
        return redirect()->route('companies.show', ['company' => $company->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $company = tb_crm_mf_company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('status', 'Success!');
    }
}

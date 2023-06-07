<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_crm_mf_bank_request;
use App\Models\tb_crm_mf_bank;
use Illuminate\Http\Request; 

class tb_crm_mf_bank_controller extends Controller
{
    public function index(Request $r){
        $name = $r['name'];
        $banks = tb_crm_mf_bank::when(isset($name), function ($q) use ($name){
                        return $q->where('tb_crm_mf_bank.name', 'like', '%'.$name.'%');})
                                ->sortable(['id', 'code', 'name', 'is_active'])
                                ->paginate(env('ROW_COUNT', 10));
        return view('tb_crm_mf_bank.index', ['banks' => $banks]);

    }

    public function create(){
        return view('tb_crm_mf_bank.create');
    }

    public function store(tb_crm_mf_bank_request $r){
        $validatedData = $r->validated();
        $bank = new tb_crm_mf_bank();
        $bank->fill($validatedData);
        $bank->save();
        return redirect()->route('banks.show', ['bank' => $bank->id])->with('status', 'Success!');
    }

    public function show($id){
        $bank = tb_crm_mf_bank::findOrFail($id);
        return view('tb_crm_mf_bank.show', ['bank' => $bank]);
    }

    public function edit($id){
        $bank = tb_crm_mf_bank::findOrFail($id);
        return view ('tb_crm_mf_bank.edit', [
            'bank' => $bank,
        ]);
    }

    public function update(tb_crm_mf_bank_request $r, $id){
        $bank = tb_crm_mf_bank::findOrFail($id);
        $validatedData = $r->validated();
        $bank->fill($validatedData);
        $bank->update();
        return redirect()->route('banks.show', ['bank' => $bank->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $bank = tb_crm_mf_bank::findOrFail($id);
        $bank->delete();
        return redirect()->route('banks.index')->with('status', 'Success!');
    }
}

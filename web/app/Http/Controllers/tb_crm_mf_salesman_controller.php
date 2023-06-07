<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_crm_mf_salesman;
use App\Http\Requests\tb_crm_mf_salesman_request;

class tb_crm_mf_salesman_controller extends Controller
{
    public function index(Request $r){
        $name = $r['name'];
        $salesmen = tb_crm_mf_salesman::when(isset($name), function ($q) use ($name){
                        return $q->where('tb_crm_mf_salesman.name', 'like', '%'.$name.'%');})
                                ->sortable(['id', 'code', 'name', 'is_active'])
                                ->paginate(env('ROW_COUNT', 10));
        return view('tb_crm_mf_salesman.index', ['salesmen' => $salesmen]);

    }

    public function create(){
        return view('tb_crm_mf_salesman.create');
    }

    public function store(tb_crm_mf_salesman_request $r){
        $validatedData = $r->validated();
        $salesman = new tb_crm_mf_salesman();
        $salesman->fill($validatedData);
        $salesman->save();
        return redirect()->route('salesmen.show', ['salesman' => $salesman->id])->with('status', 'Success!');
    }

    public function show($id){
        $salesman = tb_crm_mf_salesman::findOrFail($id);
        return view('tb_crm_mf_salesman.show', ['salesman' => $salesman]);
    }

    public function edit($id){
        $salesman = tb_crm_mf_salesman::findOrFail($id);
        return view ('tb_crm_mf_salesman.edit', [
            'salesman' => $salesman,
        ]);
    }

    public function update(tb_crm_mf_salesman_request $r, $id){
        $salesman = tb_crm_mf_salesman::findOrFail($id);
        $validatedData = $r->validated();
        $salesman->fill($validatedData);
        $salesman->update();
        return redirect()->route('salesmen.show', ['salesman' => $salesman->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $salesman = tb_crm_mf_salesman::findOrFail($id);
        $salesman->delete();
        return redirect()->route('salesmen.index')->with('status', 'Success!');
    }
}

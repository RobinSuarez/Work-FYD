<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_crm_mf_tax_type_request;
use App\Models\tb_crm_mf_tax_type;
use Illuminate\Http\Request;

class tb_crm_mf_tax_type_controller extends Controller
{
    public function index(Request $r){
        $name = $r['name'];
        $tax_types = tb_crm_mf_tax_type::when(isset($name), function ($q) use ($name){
            return $q->where('tb_crm_mf_tax_type.name', 'like', '%'.$name.'%');})
                    ->sortable(['id', 'code', 'name', 'is_active'])
                    ->paginate(env('ROW_COUNT'));
        return view('tb_crm_mf_tax_type.index', ['tax_types' => $tax_types]);
    }

    public function create(){
        return view('tb_crm_mf_tax_type.create');
    }

    public function store(tb_crm_mf_tax_type_request $r){
        $validatedData = $r->validated();
        $tax_type = new tb_crm_mf_tax_type();
        $tax_type->fill($validatedData);
        $tax_type->save();
        return redirect()->route('tax-types.show', ['tax_type' => $tax_type->id])->with('status', 'Success!');
    }

    public function show($id){
        $tax_type = tb_crm_mf_tax_type::findOrFail($id);
        return view('tb_crm_mf_tax_type.show', ['tax_type' => $tax_type]);
    }

    public function edit($id){
        $tax_type = tb_crm_mf_tax_type::findOrFail($id);
        return view ('tb_crm_mf_tax_type.edit', [
            'tax_type' => $tax_type,
        ]);
    }

    public function update(tb_crm_mf_tax_type_request $r, $id){
        $tax_type = tb_crm_mf_tax_type::findOrFail($id);
        $validatedData = $r->validated();
        $tax_type->fill($validatedData);
        $tax_type->update();
        return redirect()->route('tax-types.show', ['tax_type' => $tax_type->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $tax_type = tb_crm_mf_tax_type::findOrFail($id);
        $tax_type->delete();
        return redirect()->route('tax-types.index')->with('status', 'Success!');
    }
}

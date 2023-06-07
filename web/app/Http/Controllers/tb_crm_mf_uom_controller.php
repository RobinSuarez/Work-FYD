<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_crm_mf_uom_request;
use App\Models\tb_crm_mf_uom;
use Illuminate\Http\Request;

class tb_crm_mf_uom_controller extends Controller
{
    public function index(Request $r){
        $name = $r['name'];
        $uoms = tb_crm_mf_uom::when(isset($name), function ($q) use ($name){
                        return $q->where('tb_crm_mf_uom.name', 'like', '%'.$name.'%');})
                                ->sortable(['id', 'code', 'name', 'is_active'])
                                ->paginate(env('ROW_COUNT'));
        return view('tb_crm_mf_uom.index', ['uoms' => $uoms]);

    }

    public function create(){
        return view('tb_crm_mf_uom.create');
    }

    public function store(tb_crm_mf_uom_request $r){
        $validatedData = $r->validated();
        $uom = new tb_crm_mf_uom();
        $uom->fill($validatedData);
        $uom->save();
        return redirect()->route('uoms.show', ['uom' => $uom->id])->with('status', 'Success!');
    }

    public function show($id){
        $uom = tb_crm_mf_uom::findOrFail($id);
        return view('tb_crm_mf_uom.show', ['uom' => $uom]);
    }

    public function edit($id){
        $uom = tb_crm_mf_uom::findOrFail($id);
        return view ('tb_crm_mf_uom.edit', [
            'uom' => $uom,
        ]);
    }

    public function update(tb_crm_mf_uom_request $r, $id){
        $uom = tb_crm_mf_uom::findOrFail($id);
        $validatedData = $r->validated();
        $uom->fill($validatedData);
        $uom->update();
        return redirect()->route('uoms.show', ['uom' => $uom->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $uom = tb_crm_mf_uom::findOrFail($id);
        $uom->delete();
        return redirect()->route('uoms.index')->with('status', 'Success!');
    }
}

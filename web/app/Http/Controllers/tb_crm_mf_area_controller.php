<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_crm_mf_area_request;
use App\Models\tb_crm_mf_area;
use Illuminate\Http\Request;

class tb_crm_mf_area_controller extends Controller
{
    public function index(Request $r){
        $name = $r['name'];
        $areas = tb_crm_mf_area::when(isset($name), function ($q) use ($name){
                        return $q->where('tb_crm_mf_area.name', 'like', '%'.$name.'%');})
                                ->sortable(['id', 'code', 'name', 'is_active'])
                                ->paginate(env('ROW_COUNT', 10));
        return view('tb_crm_mf_area.index', ['areas' => $areas]);

    }

    public function create(){
        return view('tb_crm_mf_area.create');
    }

    public function store(tb_crm_mf_area_request $r){
        $validatedData = $r->validated();
        $area = new tb_crm_mf_area();
        $area->fill($validatedData);
        $area->save();
        return redirect()->route('areas.show', ['area' => $area->id])->with('status', 'Success!');
    }

    public function show($id){
        $area = tb_crm_mf_area::findOrFail($id);
        return view('tb_crm_mf_area.show', ['area' => $area]);
    }

    public function edit($id){
        $area = tb_crm_mf_area::findOrFail($id);
        return view ('tb_crm_mf_area.edit', [
            'area' => $area,
        ]);
    }

    public function update(tb_crm_mf_area_request $r, $id){
        $area = tb_crm_mf_area::findOrFail($id);
        $validatedData = $r->validated();
        $area->fill($validatedData);
        $area->update();
        return redirect()->route('areas.show', ['area' => $area->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $area = tb_crm_mf_area::findOrFail($id);
        $area->delete();
        return redirect()->route('areas.index')->with('status', 'Success!');
    }
}

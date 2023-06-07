<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_crm_mf_service_request;
use App\Models\tb_crm_mf_service;
use App\Models\tb_crm_mf_uom;
use Illuminate\Http\Request; 

class tb_crm_mf_service_controller extends Controller
{
    public function index(Request $r){
        $name = $r['name'];
        $services = tb_crm_mf_service::when(isset($name), function ($q) use ($name){
            return $q->where('tb_crm_mf_service.name', 'like', '%'.$name.'%');})
                    ->sortable(['id', 'code', 'name', 'is_active'])
                    ->paginate(env('ROW_COUNT'));
        return view('tb_crm_mf_service.index', ['services' => $services]);
    }

    public function create(){
        $uoms = tb_crm_mf_uom::where('is_active', '=', 1)->get();
        return view('tb_crm_mf_service.create', [
            'uoms' => $uoms
        ]);
    }

    public function store(tb_crm_mf_service_request $r){
        $validatedData = $r->validated();
        $service = new tb_crm_mf_service();
        $service->fill($validatedData);
        $service->save();
        return redirect()->route('services.show', ['service' => $service->id])->with('status', 'Success!');
    }

    public function show($id){
        $service = tb_crm_mf_service::findOrFail($id);
        $uoms = tb_crm_mf_uom::where('id', '=', $service->uom_id)->get();
        return view('tb_crm_mf_service.show', [
            'service' => $service,
            'uoms'  => $uoms
        ]);
    }

    public function edit($id){
        $service = tb_crm_mf_service::findOrFail($id);
        $uoms = tb_crm_mf_uom::where('is_active', '=', 1)->get();
        return view ('tb_crm_mf_service.edit', [
            'service' => $service,
            'uoms' => $uoms
        ]);
    }

    public function update(tb_crm_mf_service_request $r, $id){
        $service = tb_crm_mf_service::findOrFail($id);
        $validatedData = $r->validated();
        $service->fill($validatedData);
        $service->update();
        return redirect()->route('services.show', ['service' => $service->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $service = tb_crm_mf_service::findOrFail($id);
        $service->delete();
        return redirect()->route('services.index')->with('status', 'Success!');
    }
}

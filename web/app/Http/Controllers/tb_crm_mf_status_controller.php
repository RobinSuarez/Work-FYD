<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_crm_mf_status_request;
use App\Models\tb_crm_mf_status;
use Illuminate\Http\Request;

class tb_crm_mf_status_controller extends Controller
{
    public function index(Request $r){
        $name = $r['name'];
        $statuses = tb_crm_mf_status::when(isset($name), function ($q) use ($name){
            return $q->where('tb_crm_mf_status.name', 'like', '%'.$name.'%');})
                    ->sortable(['id', 'code', 'name', 'is_active'])
                    ->paginate(env('ROW_COUNT'));
        return view('tb_crm_mf_status.index', ['statuses' => $statuses]);
    }

    public function create(){
        return view('tb_crm_mf_status.create');
    }

    public function store(tb_crm_mf_status_request $r){
        $validatedData = $r->validated();
        $status = new tb_crm_mf_status();
        $status->fill($validatedData);
        $status->save();
        return redirect()->route('statuses.show', ['status' => $status->id])->with('status', 'Success!');
    }

    public function show($id){
        $status = tb_crm_mf_status::findOrFail($id);
        return view('tb_crm_mf_status.show', ['status' => $status]);
    }

    public function edit($id){
        $status = tb_crm_mf_status::findOrFail($id);
        return view ('tb_crm_mf_status.edit', [
            'status' => $status,
        ]);
    }

    public function update(tb_crm_mf_status_request $r, $id){
        $status = tb_crm_mf_status::findOrFail($id);
        $validatedData = $r->validated();
        $status->fill($validatedData);
        $status->update();
        return redirect()->route('statuses.show', ['status' => $status->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $status = tb_crm_mf_status::findOrFail($id);
        $status->delete();
        return redirect()->route('statuses.index')->with('status', 'Success!');
    }
}

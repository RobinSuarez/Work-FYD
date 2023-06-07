<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_crm_mf_client_request;
use App\Models\tb_crm_mf_area;
use App\Models\tb_crm_mf_client;
use Illuminate\Http\Request;

class tb_crm_mf_client_controller extends Controller
{
    public function index(Request $r){
        $name = $r['name'];
        $clients = tb_crm_mf_client::when(isset($name), function ($q) use ($name){
                        return $q->where('tb_crm_mf_client.name', 'like', '%'.$name.'%');})
                                ->sortable(['id', 'code', 'name', 'is_active'])
                                ->paginate(env('ROW_COUNT'));
        return view('tb_crm_mf_client.index', ['clients' => $clients]);

    }

    public function create(){
        $areas = tb_crm_mf_area::where('is_active', '=', 1)->get();
        return view('tb_crm_mf_client.create', [
            'areas' => $areas
        ]);
    }

    public function store(tb_crm_mf_client_request $r){
        $validatedData = $r->validated();
        $client = new tb_crm_mf_client();
        $client->fill($validatedData);
        $client->save();
        return redirect()->route('clients.show', ['client' => $client->id])->with('status', 'Success!');
    }

    public function show($id){
        
        $client = tb_crm_mf_client::findOrFail($id);
        $areas = tb_crm_mf_area::where('is_active', '=', $client->area_id)->get();
        return view('tb_crm_mf_client.show', [
            'client' => $client,
            'areas' => $areas
        ]);
    }

    public function edit($id){
        $client = tb_crm_mf_client::findOrFail($id);
        $areas = tb_crm_mf_area::where('is_active', '=', 1)->get();
        return view ('tb_crm_mf_client.edit', [
            'client' => $client,
            'areas' => $areas
        ]);
    }

    public function update(tb_crm_mf_client_request $r, $id){
        $client = tb_crm_mf_client::findOrFail($id);
        $validatedData = $r->validated();
        $client->fill($validatedData);
        $client->update();
        return redirect()->route('clients.show', ['client' => $client->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $client = tb_crm_mf_client::findOrFail($id);
        $client->delete();
        return redirect()->route('clients.index')->with('status', 'Success!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_ar_tr_soa_request;
use App\Models\tb_ar_tr_soa;
use App\Models\tb_crm_mf_client;
use App\Models\tb_crm_mf_status;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class tb_ar_tr_soa_controller extends Controller
{
    public function index(Request $r){
        $no = $r['no'];
        $soas = tb_ar_tr_soa::join('tb_crm_mf_status', 'tb_crm_mf_status.id', 'tb_ar_tr_soa.status_id')
                        ->when(isset($no), function ($q) use ($no){
                            return $q->where('tb_ar_tr_soa.no', 'like', '%'.$no.'%');})
                        ->select('tb_ar_tr_soa.id', 'tb_ar_tr_soa.date', 'tb_ar_tr_soa.no', 'tb_crm_mf_status.name as status',
                            'tb_ar_tr_soa.remarks')
                        ->sortable()
                        ->paginate(env('ROW_COUNT'));
        return view('tb_ar_tr_soa.index', ['soas' => $soas]);
    }

    public function create(){
        $clients = tb_crm_mf_client::where('is_active', '=', 1)->get();
        $statuses = tb_crm_mf_status::where('is_active', '=', 1)->get();
        $def_date = Carbon::now('UTC')->toDateString();
        return view('tb_ar_tr_soa.create', [
            'clients'  => $clients,
            'statuses' => $statuses,
            'def_date' => $def_date,
        ]);
    }

    public function store(tb_ar_tr_soa_request $r){
        $validatedData = $r->validated();
        switch ($r['status']) {
            case 'save':
                $validatedData['status_id'] = 1;
                break;
            case 'post':
                $validatedData['status_id'] = 2;
                break;
            default:
                throw ValidationException::withMessages(['status' => 'Status not supported']);
                break;
        }
        $soa = new tb_ar_tr_soa();
        $soa->fill($validatedData);
        $soa->save();
        return redirect()->route('soas.show', ['soa' => $soa->id])->with('status', 'Success!');
    }

    public function show($id){
        $soa = tb_ar_tr_soa::findOrFail($id);
        $soa_apps = DB::table('vw_ar_tr_soa_app')->where('soa_id', '=', $soa->id)->get();
        $clients = tb_crm_mf_client::where('is_active', '=', 1)->get();
        $statuses = tb_crm_mf_status::where('id', '=', $soa->status_id)->get();

        return view('tb_ar_tr_soa.show', [
            'soa'       => $soa,
            'soa_apps'  => $soa_apps,
            'clients'   => $clients,
            'statuses'  => $statuses,
        ]);
    }

    public function edit($id){ 
        $soa = tb_ar_tr_soa::findOrFail($id);
        $status_id = $soa->status_id;
        $clients = tb_crm_mf_client::where('is_active', '=', 1)->get();
        $soa_apps = DB::table('vw_ar_tr_soa_app')->where('soa_id', '=', $soa->id)->get();
        $statuses = tb_crm_mf_status::where('is_active', '=', 1)->get();
        return view ('tb_ar_tr_soa.edit', [
            'soa'       => $soa,
            'soa_apps'  => $soa_apps,
            'status_id'  => $status_id,
            'clients'   => $clients,
            'statuses'  => $statuses,
        ]);
    }

    public function update(tb_ar_tr_soa_request $r, $id){
        $soa = tb_ar_tr_soa::findOrFail($id);
        $validatedData = $r->validated();
        switch ($r['status']) {
            case 'save':
                $validatedData['status_id'] = 1;
                break;
            case 'post':
                $validatedData['status_id'] = 2;
                break;
            case 'cancel':
                $validatedData['status_id'] = 3;
                break;
            default:
                throw ValidationException::withMessages(['status' => 'Status not supported']);
                break;
        }
        $soa->fill($validatedData);
        $soa->update();
        if ($r['status'] == 'save') {
            return redirect()->route('soas.edit', ['soa' => $soa->id]);
        }
        return redirect()->route('soas.show', ['soa' => $soa->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $soa = tb_ar_tr_soa::findOrFail($id);
        $soa->delete();
        return redirect()->route('soas.index')->with('status', 'Success!');
    }
} 

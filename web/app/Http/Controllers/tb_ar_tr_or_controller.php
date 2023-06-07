<?php

namespace App\Http\Controllers;

use App\Http\Requests\tb_ar_tr_or_request;
use App\Models\tb_ar_tr_or;
use App\Models\tb_ar_tr_or_app;
use App\Models\tb_ar_tr_or_pay_cash;
use App\Models\tb_ar_tr_or_pay_check;
use App\Models\tb_crm_mf_client;
use App\Models\tb_crm_mf_status;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class tb_ar_tr_or_controller extends Controller
{
    public function index(Request $r){
        $no = $r['no'];
        $ors = tb_ar_tr_or::join('tb_crm_mf_status', 'tb_crm_mf_status.id', 'tb_ar_tr_or.status_id')
                        ->join('tb_crm_mf_client', 'tb_crm_mf_client.id', 'tb_ar_tr_or.client_id')
                        ->when(isset($no), function ($q) use ($no){
                            return $q->where('tb_ar_tr_or.no', 'like', '%'.$no.'%');})
                        ->select('tb_ar_tr_or.id', 'tb_ar_tr_or.date', 'tb_ar_tr_or.no', 'tb_crm_mf_status.name as status',
                            'tb_ar_tr_or.remarks', 'tb_crm_mf_client.name as client')
                        ->sortable()
                        ->paginate(env('ROW_COUNT'));
        return view('tb_ar_tr_or.index', ['ors' => $ors]);
    }

    public function create(){
        $statuses = tb_crm_mf_status::where('is_active', '=', 1)->get();
        $clients = tb_crm_mf_client::where('is_active', '=', 1)->get();
        $def_date = Carbon::now('UTC')->toDateString();
        return view('tb_ar_tr_or.create', [
            'statuses' => $statuses,
            'clients'  => $clients,
            'def_date' => $def_date,
        ]);
    }

    public function store(tb_ar_tr_or_request $r){
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
        $or = new tb_ar_tr_or();
        $or->fill($validatedData);
        $or->save();
        return redirect()->route('ors.show', ['or' => $or->id])->with('status', 'Success!');
    }

    public function show($id){
        $or = tb_ar_tr_or::findOrFail($id);
        $or_pay_cashes = tb_ar_tr_or_pay_cash::where('or_id', '=', $or->id)->get();
        $or_pay_checks = tb_ar_tr_or_pay_check::select('tb_ar_tr_or_pay_check.id', 'tb_ar_tr_or_pay_check.or_id', 'tb_ar_tr_or_pay_check.check_no',
                                                        'tb_ar_tr_or_pay_check.check_date', 'tb_crm_mf_bank.name as bank', 'tb_ar_tr_or_pay_check.amount',
                                                        'tb_ar_tr_or_pay_check.remarks')
                                                ->join('tb_crm_mf_bank', 'tb_crm_mf_bank.id', 'tb_ar_tr_or_pay_check.bank_id')
                                                ->where('or_id', '=', $or->id)->get();
        $or_apps = DB::table('vw_ar_tr_or_app')->where('or_id', '=', $or->id)->get();
        $clients = tb_crm_mf_client::where('id', '=', $or->client_id)->get();
        $statuses = tb_crm_mf_status::where('id', '=', $or->status_id)->get();
        return view('tb_ar_tr_or.show', [
            'or'                   => $or,
            'clients'              => $clients,
            'or_pay_cashes'        => $or_pay_cashes,
            'or_pay_checks'        => $or_pay_checks,
            'or_apps'              => $or_apps,
            'statuses'             => $statuses,
        ]);
    }

    public function edit($id){
        $or = tb_ar_tr_or::findOrFail($id);
        $trans_status = $or->status_id;
        if ($trans_status == 1){
            $disabled = "0";
        }else{
            $disabled = "1";
        }
        $clients = tb_crm_mf_client::where('is_active', '=', 1)->get();
        $or_pay_cashes = tb_ar_tr_or_pay_cash::where('or_id', '=', $or->id)->get();
        $or_pay_checks = tb_ar_tr_or_pay_check::select('tb_ar_tr_or_pay_check.id', 'tb_ar_tr_or_pay_check.or_id', 'tb_ar_tr_or_pay_check.check_no',
                                                        'tb_ar_tr_or_pay_check.check_date', 'tb_crm_mf_bank.name as bank', 'tb_ar_tr_or_pay_check.amount',
                                                        'tb_ar_tr_or_pay_check.remarks')
                                                ->join('tb_crm_mf_bank', 'tb_crm_mf_bank.id', 'tb_ar_tr_or_pay_check.bank_id')
                                                ->where('or_id', '=', $or->id)->get();
        $or_apps = DB::table('vw_ar_tr_or_app')->where('or_id', '=', $or->id)->get();
        $statuses = tb_crm_mf_status::where('is_active', '=', 1)->get();
        return view ('tb_ar_tr_or.edit', [
            'or'              => $or,
            'clients'         => $clients,
            'or_pay_cashes'   => $or_pay_cashes,
            'or_pay_checks'   => $or_pay_checks,
            'or_apps'         => $or_apps,
            'disabled'        => $disabled,
            'statuses'        => $statuses,
        ]);
    }

    public function update(tb_ar_tr_or_request $r, $id){
        $or = tb_ar_tr_or::findOrFail($id);
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
        $validatedData['total_cash_amount'] = preg_replace('/(?<=\d),(?=\d)/','',$validatedData['total_cash_amount']);
        $validatedData['total_check_amount'] = preg_replace('/(?<=\d),(?=\d)/','',$validatedData['total_check_amount']);
        $validatedData['total_applied'] = preg_replace('/(?<=\d),(?=\d)/','',$validatedData['total_applied']);
        $or->fill($validatedData);
        $or->update();
        if ($r['status'] == 'save') {
            return redirect()->route('ors.edit', ['or' => $or->id]);
        }
        return redirect()->route('ors.show', ['or' => $or->id])->with('status', 'Success!');
    }

    public function destroy(Request $r, $id){
        $or = tb_ar_tr_or::findOrFail($id);
        $or->delete();
        return redirect()->route('ors.index')->with('status', 'Success!');
    }
}

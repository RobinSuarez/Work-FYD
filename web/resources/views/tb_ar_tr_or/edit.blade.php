@extends('layouts.app')
@section('head')
    @select2head
    @endselect2head
@endsection
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('ors.index') }}">OR</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('ors.update', ['or'=> $or->id])}}" enctype="multipart/form-data" id="main-form">
                @csrf
                @method('PUT')
                <div class="row mb-1">
                    @text([
                        'name' => 'id',
                        'value' => $or->id,
                        'disabled' => 1,
                    ])@endtext

                    @text([
                        'name' => 'no',
                        'value' => old('no') ?? $or->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => $disabled
                    ])@endtext

                    @datefield([
                        'name'  => 'date',
                        'value' => old('date') ?? $or->date,
                        'disabled' => $disabled
                    ])@enddatefield
                    
                    @select([
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => old('client_id') ?? $or->client_id,
                        'disabled' => $disabled
                    ])@endselect

                    @text([
                        'name'          => 'total_cash_amount',
                        'value'         => number_format($or->total_cash_amount, 2),
                        'placeholder'   => 'Enter the total_cash_amount',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_check_amount',
                        'value'         => number_format($or->total_check_amount, 2),
                        'placeholder'   => 'Enter the total_check_amount',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_pay_amount',
                        'value'         => number_format($or->total_pay_amount, 2),
                        'placeholder'   => 'Enter the total_check_amount',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_applied',
                        'value'         => number_format($or->total_applied, 2),
                        'placeholder'   => 'Enter the total_applied',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_excess',
                        'value'         => number_format($or->total_excess, 2),
                        'placeholder'   => 'Enter the total_excess',
                        'disabled'      => 1
                    ])@endtext


                    @textarea([
                        'name'          => 'remarks',
                        'value'         => old('remarks') ?? $or->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled'      => $disabled
                    ])@endtextarea()

                    @select([
                        'name'      => 'status_id',
                        'label'     => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id') ?? $or->status_id,
                        'disabled'  => 1
                    ])@endselect
                </div>

                @if ($or->status_id == 1)
                    {{-- <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Save
                    </button> --}}

                    <button type="submit" class="btn btn-sm btn-success mt-1 btn-user form-btn" name="status" value="post" form="main-form">
                        <i class="fa-solid fa-check-to-slot"></i> Post
                    </button>

                    <button type="submit" class="btn btn-sm btn-danger mt-1 btn-user form-btn" name="status" value="cancel" form="main-form">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </button>
                @elseif($or->status_id == 2)
                    <button type="submit" class="btn btn-sm btn-secondary mt-1 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Change
                    </button>

                @else
                    <button type="submit" class="btn btn-sm btn-secondary mt-1 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Change
                    </button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    OR Pay Cash
                </div>
                <div class="card-body">
                    @if($disabled == "0")
                    <div class="form d-inline">
                        <a href="{{ route('or-pay-cashes.create', ['id' => $or->id]) }}"
                            class="btn btn-sm btn-secondary mb-3 create-btn">
                            <i class="fa-regular fa-plus"></i> New Record
                        </a>
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead class="table-light-blue">
                            <tr>
                                <td>NO.</td>
                                <td>ID</td>
                                <td>AMOUNT</td>
                                <td>REF NO</td>
                                <td>REF DATE</td>
                                @if($disabled == "0")
                                    <td>ACTIONS</td>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($or_pay_cashes as $or_pay_cash)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('or-pay-cashes.show', ['id' => $or_pay_cash->id]) }}">{{ sprintf('%08d', $or_pay_cash->id) }}</a></td>
                                <td>{{ number_format($or_pay_cash->amount, 2) }}</td>
                                <td>{{ $or_pay_cash->ref_no }}</td>
                                <td>{{ $or_pay_cash->ref_date }}</td>
                                @if($disabled == "0")
                                <td>
                                    <div class="form d-inline">
                                        <a href="{{ route('or-pay-cashes.edit', ['id' => $or_pay_cash->id]) }}" class="btn btn-sm btn-secondary action-btn">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </div>
                                    <form method="POST" class="form d-inline " action="{{ route('or-pay-cashes.destroy', ['id' => $or_pay_cash->id]) }} " class="d-inline" id="{{ $or_pay_cash->id }}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="Delete!" class="btn btn-sm btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="{{ $or_pay_cash->id }}">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    OR Pay Check
                </div>
                <div class="card-body">
                    @if($disabled == "0")
                    <div class="form d-inline">
                        <a href="{{ route('or-pay-checks.create', ['id' => $or->id]) }}"
                            class="btn btn-secondary mb-3 create-btn">
                            <i class="fa-regular fa-plus"></i> New Record
                        </a>
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead class="table-light-blue">
                            <tr>
                                <td>NO.</td>
                                <td>ID</td>
                                <td>CHECK NO</td>
                                <td>CHECK DATE</td>
                                <td>BANK</td>
                                <td>AMOUNT</td>
                                @if($disabled == "0")
                                    <td>ACTIONS</td>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($or_pay_checks as $or_pay_check)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('or-pay-checks.show', ['id' => $or_pay_check->id]) }}">{{ sprintf('%08d', $or_pay_check->id) }}</a></td>
                                <td>{{ $or_pay_check->check_no }}</td>
                                <td>{{ $or_pay_check->check_date }}</td>
                                <td>{{ $or_pay_check->bank }}</td>
                                <td>{{ number_format($or_pay_check->amount, 2) }}</td>
                                @if($disabled == "0")
                                <td>
                                    <div class="form d-inline">
                                        <a href="{{ route('or-pay-checks.edit', ['id' => $or_pay_check->id]) }}" class="btn btn-secondary action-btn">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </div>
                                    <form method="POST" class="form d-inline " action="{{ route('or-pay-checks.destroy', ['id' => $or_pay_check->id]) }} " class="d-inline" id="{{ $or_pay_check->id }}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="{{ $or_pay_check->id }}">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            OR App
        </div>
        <div class="card-body">
            @if($disabled == "0")
            <div class="form d-inline">
                <a href="{{ route('or-apps.searcher', ['id' => $or->id]) }}"
                    class="btn btn-secondary mb-3 create-btn">
                    <i class="fa-solid fa-magnifying-glass"></i> Searcher
                </a>
            </div>
            @endif
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>TRANS ID</td>
                        <td>TRANS NO</td>
                        <td>TRANS DATE</td>
                        <td>TRANS REMARKS</td>
                        <td>AMOUNT</td>
                        <td>BALANCE</td>
                        <td>APPLIED</td>
                        <td>AFTER APPLIED</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($or_apps as $or_app)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $or_app->trans_id }}</td>
                        <td>{{ $or_app->trans_no }}</td>
                        <td>{{ $or_app->trans_date }}</td>
                        <td>{{ $or_app->trans_remarks }}</td>
                        <td>{{ number_format($or_app->amount, 2) }}</td>
                        <td>{{ number_format($or_app->balance, 2) }}</td>
                        <td>{{ number_format($or_app->amount_applied, 2)  }}</td>
                        <td>{{ number_format($or_app->amount_after_applied, 2)  }}</td>
                        
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});

        @select2js([
            'column'        => 'client_id',
            'placeholder'   => 'Select the client',
            'model_path'    => 'App\Models\tb_crm_mf_client',
        ])@endselect2js
</script>
@endsection
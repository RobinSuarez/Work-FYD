@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('ors.index') }}">OR</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                    @text([
                        'name'      => 'id',
                        'value'     => $or->id,
                        'disabled'  => 1,
                    ])@endtext

                    @text([
                        'name' => 'no',
                        'value' => old('no') ?? $or->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => 1,
                    ])@endtext

                    @datefield([
                        'name'  => 'date',
                        'value' => old('date') ?? $or->date,
                        'disabled' => 1,
                    ])@enddatefield

                    @select([
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => old('client_id') ?? $or->client_id,
                        'disabled'  => 1,
                    ])@endselect

                    @text([
                        'name'          => 'total_cash_amount',
                        'value'         => old('total_cash_amount') ?? number_format($or->total_cash_amount, 2),
                        'placeholder'   => 'Enter the total_cash_amount',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_check_amount',
                        'value'         => old('total_check_amount') ?? number_format($or->total_check_amount, 2),
                        'placeholder'   => 'Enter the total_check_amount',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_pay_amount',
                        'value'         => old('total_pay_amount')?? number_format($or->total_pay_amount, 2),
                        'placeholder'   => 'Enter the total_check_amount',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_applied',
                        'value'         => old('total_applied')?? number_format($or->total_applied, 2),
                        'placeholder'   => 'Enter the total_applied',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_excess',
                        'value'         => old('total_excess')?? number_format($or->total_excess, 2),
                        'placeholder'   => 'Enter the total_excess',
                        'disabled'      => 1
                    ])@endtext

                    @textarea([
                        'name'          => 'remarks',
                        'value'         => old('remarks') ?? $or->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled'      => 1,
                    ])@endtextarea()

                    @select([
                        'name' => 'status_id',
                        'label' => 'STATUS',
                        'elements'  => $statuses,
                        'value' => old('status_id') ?? $or->status_id,
                        'disabled' => 1,
                    ])@endselect
                
            </div>

            <a href="{{route('ors.edit', ['or' => $or->id])}}" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    OR Pay Cash
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="table-light-blue">
                            <tr>
                                <td>NO.</td>
                                <td>ID</td>
                                <td>AMOUNT</td>
                                <td>REF NO</td>
                                <td>REF DATE</td>
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
                    <table class="table table-striped">
                        <thead class="table-light-blue">
                            <tr>
                                <td>NO.</td>
                                <td>ID</td>
                                <td>CHECK NO</td>
                                <td>CHECK DATE</td>
                                <td>BANK</td>
                                <td>AMOUNT</td>
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
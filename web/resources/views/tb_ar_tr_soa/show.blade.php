@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('soas.index') }}">Statement of Account</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                    @text([
                        'name'      => 'id',
                        'value'     => $soa->id,
                        'disabled'  => 1,
                    ])@endtext

                    @datefield([
                        'name'  => 'date',
                        'value' => old('date') ?? $soa->date,
                        'disabled' => 1,
                    ])@enddatefield

                    @text([
                        'name' => 'no',
                        'value' => old('no') ?? $soa->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => 1,
                    ])@endtext

                    @select([
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => old('client_id') ?? $soa->client_id,
                        'disabled'  => 1,
                    ])@endselect

                    @textarea([
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $soa->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => 1,
                    ])@endtextarea()

                    @select([
                        'name' => 'status_id',
                        'label' => 'STATUS',
                        'elements'  => $statuses,
                        'value' => old('status_id') ?? $soa->status_id,
                        'disabled' => 1,
                    ])@endselect
                
            </div>

            <a href="{{route('soas.edit', ['soa' => $soa->id])}}" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            SOA Application
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>ID</td>
                        <td>AR LR CUST ID</td>
                        <td>CLIENT</td>
                        <td>PROPOSAL</td>
                        <td>CONTRACT</td>
                        <td>DUE DATE</td>
                        <td>SERVICE</td>
                        <td>AMOUNT</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($soa_apps as $soa_app)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ sprintf('%08d', $soa_app->id) }}</td>
                        <td>{{ sprintf('%08d', $soa_app->ar_lr_cust_id) }}</td>
                        <td>{{ $soa_app->client_name}}</td>
                        <td>{{ $soa_app->proposal_no }}</td>
                        <td>{{ $soa_app->contract_no }}</td>
                        <td>{{ $soa_app->due_date }}</td>
                        <td>{{ $soa_app->service_name }}</td>
                        <td>{{ number_format($soa_app->amount, 2)}}</td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
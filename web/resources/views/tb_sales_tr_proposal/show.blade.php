@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('proposals.index') }}">Proposal</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                    @text([
                        'name' => 'id',
                        'value' => $proposal->id,
                        'disabled' => 1,
                    ])@endtext

                    @datefield([
                        'name'  => 'date',
                        'value' => old('date') ?? $proposal->date,
                        'disabled' => 1,
                    ])@enddatefield

                    @text([
                        'name' => 'no',
                        'value' => old('no') ?? $proposal->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => 1,
                    ])@endtext

                    @select([
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => $proposal->company_id ?? old('company_id'), 
                        'disabled'  => 1,
                    ])@endselect

                    
                    @select([
                        'name' => 'salesman_id',
                        'label' => 'SALESMAN',
                        'elements'  => $salesmen,
                        'value'     => $proposal->salesman_id ?? old('salesman_id'), 
                        'disabled'  => 1,
                    ])@endselect

                    @select([
                        'name'      => 'company_id',
                        'label'     => 'COMPANY',
                        'elements'  => $companies,
                        'value'     => $proposal->company_id ?? old('company_id'), 
                        'disabled'  => 1,
                    ])@endselect

                    @text([
                        'name' => 'version_id',
                        'label' => 'VERSION',
                        'value' => old('version_id') ?? $proposal->version_id,
                        'placeholder'   => 'Enter the VERSION No.',
                        'disabled' => 1,
                    ])@endtext

                    @text([
                        'name' => 'amount',
                        'value' => number_format($proposal->amount, 2),
                        'disabled' => 1,
                    ])@endtext

                    @select([
                        'name' => 'tax_type_id',
                        'label' => 'TAX TYPE',
                        'elements'  => $tax_types,
                        'value' => old('tax_type_id') ?? $proposal->tax_type_id,
                        'disabled' => 1,
                    ])@endselect

                    @textarea([
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $proposal->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => 1,
                    ])@endtextarea()

                    @select([
                        'name' => 'status_id',
                        'label' => 'STATUS',
                        'elements'  => $statuses,
                        'value' => old('status_id') ?? $proposal->status_id,
                        'disabled' => 1,
                    ])@endselect
                
            </div>

            <a href="{{route('proposals.edit', ['proposal' => $proposal->id])}}" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            Proposal Services
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>ID</td>
                        <td>SERVICE</td>
                        <td>QTY</td>
                        <td>PRICE</td>
                        <td>TOTAL</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proposal_services as $proposal_service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('proposal-services.show', ['id' => $proposal_service->id]) }}">{{ sprintf('%08d', $proposal_service->id) }}</a></td>
                        <td>{{ $proposal_service->service    }}</td>
                        <td>{{ $proposal_service->qty }}</td>
                        <td>{{ $proposal_service->price }}</td>
                        <td>{{ $proposal_service->total }}</td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
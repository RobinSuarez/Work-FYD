@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('proposals.index') }}" class="text-black text-decoration-none">PROPOSALS</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-1">
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

            <a href="{{route('proposals.edit', ['proposal' => $proposal->id])}}" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>

    @dindex([
        'ch'            => 'text-black text-decoration-none',
        'title'         => 'PROPOSAL SERVICES',
        'route'         => 'proposal-services',
        'header_var'    => 'id',
        'header_pk'     => $proposal->id,
        'detail_var'    => 'id',
        'is_edit'       => 0,
        'status_id'     => $proposal->status_id,
        'columns'       =>  [['name' => 'service', 'label' => 'SERVICE'], ['name' => 'qty', 'label' => 'QTY'],
                             ['name' => 'uom', 'label' => 'UOM'], ['name' => 'price', 'label' => 'PRICE'],
                             ['name' => 'total', 'label' => 'TOTAL'], ['name' => 'with_vat', 'label' => 'W/ VAT', 'cb' => 1]
        ],
        'details'       => $proposal_services,
        
    ])@enddindex()
</div>
@endsection
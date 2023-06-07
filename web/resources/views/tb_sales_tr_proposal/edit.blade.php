@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('proposals.index') }}" class="text-black text-decoration-none">PROPOSALS</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('proposals.update', ['proposal'=> $proposal->id])}}" enctype="multipart/form-data" id="main-form">
                @csrf
                @method('PUT')
                <div class="row mb-1">
                    @text([
                        'name' => 'id',
                        'value' => $proposal->id,
                        'disabled' => 1,
                    ])@endtext

                    @datefield([
                        'name'  => 'date',
                        'value' => old('date') ?? $proposal->date,
                        'disabled' => $disabled
                    ])@enddatefield

                    @text([
                        'name' => 'no',
                        'value' => old('no') ?? $proposal->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => $disabled
                    ])@endtext

                    @select([
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => $proposal->client_id ?? old('client_id'), 
                        'disabled'  => isset($disabled) ? $disabled : null,
                    ])@endselect

                    @select([
                        'name' => 'salesman_id',
                        'label' => 'SALESMAN',
                        'elements'  => $salesmen,
                        'value'     => $proposal->salesman_id ?? old('salesman_id'), 
                        'disabled'  => isset($disabled) ? $disabled : null,
                    ])@endselect

                    @select([
                        'name' => 'company_id',
                        'label' => 'COMPANY',
                        'elements'  => $companies,
                        'value'     => $proposal->company_id ?? old('company_id'), 
                        'disabled'  => isset($disabled) ? $disabled : null,
                    ])@endselect

                    @text([
                        'name' => 'version_id',
                        'label' => 'VERSION',
                        'value' => old('version_id') ?? $proposal->version_id,
                        'placeholder'   => 'Enter the VERSION No.',
                        'disabled' => $disabled
                    ])@endtext

                    @text([
                        'name'      => 'amount',
                        'value'     => old('amount') ?? $proposal->amount,
                        'disabled'  => 1,
                        'type'      => 'number',
                    ])@endtext

                    @select([
                        'name'      => 'tax_type_id',
                        'label'     => 'TAX TYPE',
                        'elements'  => $tax_types,
                        'value'     => $proposal->tax_type_id ?? old('tax_type_id') ,
                        'disabled'  => isset($disabled) ? $disabled : null,
                        
                    ])@endselect

                    @textarea([
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $proposal->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => $disabled
                    ])@endtextarea()

                    @select([
                        'name'      => 'status_id',
                        'label'     => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id') ?? $proposal->status_id,
                        'disabled'  => 1
                    ])@endselect
                </div>

                @if ($proposal->status_id == 1)
                    <button type="submit" class="btn btn-sm btn-success mt-1 btn-user form-btn" name="status" value="post" form="main-form">
                        <i class="fa-solid fa-check-to-slot"></i> Post
                    </button>

                    <button type="submit" class="btn btn-sm btn-danger mt-1 btn-user form-btn" name="status" value="cancel" form="main-form">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </button>
                @elseif($proposal->status_id == 2)
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

    @dindex([
        'ch'            => 'text-black text-decoration-none',
        'title'         => 'PROPOSAL SERVICES',
        'route'         => 'proposal-services',
        'header_var'    => 'id',
        'header_pk'     => $proposal->id,
        'detail_var'    => 'id',
        'is_edit'       => 1,
        'status_id'     => $proposal->status_id,
        'columns'       =>  [['name' => 'service', 'label' => 'SERVICE'], ['name' => 'qty', 'label' => 'QTY'],
                             ['name' => 'uom', 'label' => 'UOM'], ['name' => 'price', 'label' => 'PRICE'],
                             ['name' => 'total', 'label' => 'TOTAL'], ['name' => 'with_vat', 'label' => 'W/ VAT', 'cb' => 1]
        ],
        'details'       => $proposal_services,
        
    ])@enddindex()
</div>
@endsection
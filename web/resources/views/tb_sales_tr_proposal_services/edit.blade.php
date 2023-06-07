@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('proposals.edit', ['proposal' => $proposal_service->proposal_id])}}" class="text-black text-decoration-none">PROPOSAL SERVICE</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('proposal-services.update', ['id'=> $proposal_service->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    @text([
                        'name'          => 'id',
                        'value'         => $proposal_service->id,
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name'          => 'proposal_id',
                        'value'         => $proposal_service->proposal_id,
                        'disabled'      => 1,
                    ])@endtext

                    @select([
                        'name'          => 'service_id',
                        'label'         => 'SERVICE',
                        'elements'      => $services,
                        'value'         => old('service_id') ?? $proposal_service->service_id,
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endselect

                    @text([
                        'name'          => 'qty',
                        'value'         => old('qty') ?? $proposal_service->qty,
                        'placeholder'   => 'Enter the Qty',
                        'type'          => 'number',
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endtext

                    @select([
                        'name'          => 'uom_id',
                        'label'         => 'UOM',
                        'elements'      => $uoms,
                        'value'         => old('uom_id') ?? $proposal_service->uom_id,
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endselect

                    @text([
                        'name'          => 'price',
                        'value'         => old('price') ?? $proposal_service->price,
                        'placeholder'   => 'Enter the Price',
                        'type'          => 'number',
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name'          => 'total',
                        'value'         => old('total') ?? $proposal_service->total,
                        'placeholder'   => 'Enter the Total',
                        'disabled'      => 1,
                        'type'          => 'number',
                    ])@endtext

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        @checkbox([
                            'name'      => 'with_vat',
                            'value'     => old('with_vat') ?? $proposal_service->with_vat,
                            'disabled'      => isset($disabled) ? $disabled : null,
                        ])@endcheckbox()
                    </div>

                    @text([
                        'name'          => 'seq',
                        'value'         => old('seq') ?? $proposal_service->seq,
                        'placeholder'   => 'Enter the Seq',
                        'type'          => 'number',
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endtext
                </div>
                @if(($status_id ?? 0) == 1  )
                <button type="submit" class="btn btn-sm btn-secondary">
                    Submit
                </button>
                @endif
            </form>
        </div> 
    </div>

    @dindex([
        'ch'            => 'text-black text-decoration-none',
        'title'         => 'PROPOSAL SERVICES TERMS',
        'route'         => 'proposal-services-terms',
        'header_var'    => 'id',
        'header_pk'     => $proposal_service->id,
        'detail_var'    => 'id',
        'is_edit'       => 1,
        'status_id'     => $status_id,
        'columns'       =>  [['name' => 'due_date', 'label' => 'DUE DATE'], ['name' => 'amount', 'label' => 'AMOUNT'],
        ],
        'details'       => $proposal_service_terms,
    ])@enddindex()

</div>
@endsection
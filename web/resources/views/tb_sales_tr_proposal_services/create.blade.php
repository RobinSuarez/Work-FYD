@extends('layouts.app')
@section('content')\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('proposals.edit', ['proposal' => $proposal_id])}}" class="text-black text-decoration-none">PROPOSAL SERVICE</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('proposal-services.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-0">
                    @text([
                        'name'          => 'id',
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name'          => 'proposal_id',
                        'value'         => $proposal_id,
                        'disabled'      => 1,
                    ])@endtext

                    @select([
                        'name'          => 'service_id',
                        'label'         => 'SERVICE',
                        'elements'      => $services,
                        'value'         => old('service_id'),
                    ])@endselect

                    @text([
                        'name'          => 'qty',
                        'value'         => old('qty') ?? 1,
                        'placeholder'   => 'Enter the Qty',
                        'type'          => 'number'
                    ])@endtext

                    @select([
                        'name'          => 'uom_id',
                        'label'         => 'UOM',
                        'elements'      => $uoms,
                        'value'         => old('uom_id'),
                    ])@endselect

                    @text([
                        'name'          => 'price',
                        'value'         => old('price') ?? 0,
                        'placeholder'   => 'Enter the Price',
                        'disabled'      => 1,
                        'type'          => 'number'
                    ])@endtext

                    @text([
                        'name'          => 'total',
                        'value'         => old('total') ?? 0,
                        'placeholder'   => 'Enter the Total',
                        'disabled'      => 1,
                        'type'          => 'number'
                    ])@endtext

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        @checkbox([
                            'name' => 'with_vat',
                            'value' => old('with_vat') ?? 1
                        ])@endcheckbox()
                    </div>

                    @text([
                        'name'          => 'seq',
                        'value'         => old('seq') ?? 0,
                        'placeholder'   => 'Enter the Seq',
                        'type'          => 'number'
                    ])@endtext
                    
                </div>
                
                <button type="submit" class="btn btn-sm btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection 
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('proposals.edit', ['proposal' => $proposal_service->proposal_id])}}">Proposal Service</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
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
                        'disabled'      => 1,
                    ])@endselect

                    @text([
                        'name'          => 'qty',
                        'value'         => old('qty') ?? $proposal_service->qty,
                        'placeholder'   => 'Enter the Qty',
                        'type'          => 'number',
                        'disabled'      => 1,
                    ])@endtext

                    @select([
                        'name'          => 'uom_id',
                        'label'         => 'UOM',
                        'elements'      => $uoms,
                        'value'         => old('uom_id') ?? $proposal_service->uom_id,
                        'disabled'      => 1,
                    ])@endselect

                    @text([
                        'name'          => 'price',
                        'value'         => old('price') ?? number_format($proposal_service->price, 2),
                        'placeholder'   => 'Enter the Price',
                        'type'          => 'number',
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name'          => 'total',
                        'value'         => old('total') ?? number_format($proposal_service->total, 2),
                        'placeholder'   => 'Enter the Total',
                        'disabled'      => 1,
                        'type'          => 'number',
                        'disabled'      => 1,
                    ])@endtext

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        @checkbox([
                            'name'      => 'with_vat',
                            'value'     => old('with_vat') ?? $proposal_service->with_vat,
                            'disabled'  => 1,
                        ])@endcheckbox()
                    </div>

                    @text([
                        'name'          => 'seq',
                        'value'         => old('seq') ?? $proposal_service->seq,
                        'placeholder'   => 'Enter the Seq',
                        'type'          => 'number',
                        'disabled'      => 1,
                    ])@endtext
            </div>
            @if($disabled == "0")
            <a href="{{ route('proposal-services.edit', ['id' => $proposal_service->id]) }}" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
            @endif
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            Proposal Services Terms
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>ID</td>
                        <td>DUE DATE</td>
                        <td>AMOUNT</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proposal_service_terms as $proposal_service_term)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('proposal-services-terms.show', ['id' => $proposal_service_term->id]) }}">{{ sprintf('%08d', $proposal_service_term->id) }}</a></td>
                        <td>{{ $proposal_service_term->due_date }}</td>
                        <td>{{ $proposal_service_term->amount }}</td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
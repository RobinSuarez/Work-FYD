@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('proposals.edit', ['proposal' => $proposal_service->proposal_id])}}">Proposal Service</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('proposal-services.update', ['id'=> $proposal_service->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
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
                @if($disabled == "0")
                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
                @endif
            </form>
        </div> 

    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            Proposal Services Terms
        </div>
        <div class="card-body">
            @if($disabled == "0")
            <div class="form d-inline">
                <a href="{{ route('proposal-services-terms.create', ['id' => $proposal_service->id]) }}"
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
                        <td>DUE DATE</td>
                        <td>AMOUNT</td>
                        @if($disabled == "0")
                        <td>ACTIONS</td>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proposal_service_terms as $proposal_service_term)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('proposal-services-terms.show', ['id' => $proposal_service_term->id]) }}">{{ sprintf('%08d', $proposal_service_term->id) }}</a></td>
                        <td>{{ $proposal_service_term->due_date }}</td>
                        <td>{{ $proposal_service_term->amount }}</td>
                        @if($disabled == "0")
                        <td>
                            <div class="form d-inline">
                                <a href="{{ route('proposal-services-terms.edit', ['id' => $proposal_service_term->id]) }}" class="btn btn-secondary action-btn">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <form method="POST" class="form d-inline " action="{{ route('proposal-services-terms.destroy', ['id' => $proposal_service_term->id]) }} " class="d-inline" id="{{ $proposal_service_term->id }}" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="{{ $proposal_service_term->id }}">
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
@endsection
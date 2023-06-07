@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('proposals.index') }}">Proposal</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('proposals.update', ['proposal'=> $proposal->id])}}" enctype="multipart/form-data" id="main-form">
                @csrf
                @method('PUT')
                <div class="row mb-4">
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
                    <button type="submit" class="btn btn-success mt-4 btn-user form-btn" name="status" value="post" form="main-form">
                        <i class="fa-solid fa-check-to-slot"></i> Post
                    </button>

                    <button type="submit" class="btn btn-danger mt-4 btn-user form-btn" name="status" value="cancel" form="main-form">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </button>
                @elseif($proposal->status_id == 2)
                    <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Change
                    </button>

                @else
                    <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Change
                    </button>

                @endif
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            Proposal Services
        </div>
        <div class="card-body">
            @if($disabled == "0")
            <div class="form d-inline">
                <a href="{{ route('proposal-services.create', ['id' => $proposal->id]) }}"
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
                        <td>SERVICE</td>
                        <td>QTY</td>
                        <td>UOM</td>
                        <td>PRICE</td>
                        <td>TOTAL</td>
                        <td>W/ VAT</td>
                        @if($disabled == "0")
                            <td>ACTIONS</td>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proposal_services as $proposal_service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('proposal-services.show', ['id' => $proposal_service->id]) }}">{{ sprintf('%08d', $proposal_service->id) }}</a></td>
                        <td>{{ $proposal_service->service }}</td>
                        <td>{{ $proposal_service->qty }}</td>
                        <td>{{ $proposal_service->uom }}</td>
                        <td>{{ number_format($proposal_service->price, 2) }}</td>
                        <td>{{ number_format($proposal_service->total, 2) }}</td>
                        <td><input class="form-check-input" type="checkbox" value="1" {{ ($proposal_service->with_vat??0) == 1 ? "checked":""}} disabled></td>
                        @if($disabled == "0")
                        <td>
                            <div class="form d-inline">
                                <a href="{{ route('proposal-services.edit', ['id' => $proposal_service->id]) }}" class="btn btn-secondary action-btn">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <form method="POST" class="form d-inline " action="{{ route('proposal-services.destroy', ['id' => $proposal_service->id]) }} " class="d-inline" id="{{ $proposal_service->id }}" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="{{ $proposal_service->id }}">
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
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('contracts.index') }}" class="text-black text-decoration-none">CONTRACTS</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('contracts.update', ['contract'=> $contract->id])}}" enctype="multipart/form-data" id="main-form">
                @csrf
                @method('PUT')
                <div class="row mb-1">
                    @text([
                        'name' => 'id',
                        'value' => $contract->id,
                        'disabled' => 1,
                    ])@endtext

                    @datefield([
                        'name'  => 'date',
                        'value' => old('date') ?? $contract->date,
                        'disabled' => ($status_id ?? 0) == 1 ? null : 1,
                    ])@enddatefield

                    @text([
                        'name' => 'no',
                        'value' => old('no') ?? $contract->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => ($status_id ?? 0) == 1 ? null : 1,
                    ])@endtext

                    @textarea([
                        'name'          => 'remarks',
                        'value'         => old('remarks') ?? $contract->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled'      => ($status_id ?? 0) == 1 ? null : 1,
                    ])@endtextarea()

                    @select([
                        'name'      => 'status_id',
                        'label'     => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id') ?? $contract->status_id,
                        'disabled'  => 1
                    ])@endselect
                </div>

                @if ($contract->status_id == 1)
                    <button type="submit" class="btn btn-sm btn-success mt-1 btn-user form-btn" name="status" value="post" form="main-form">
                        <i class="fa-solid fa-check-to-slot"></i> Post
                    </button>

                    <button type="submit" class="btn btn-sm btn-danger mt-1 btn-user form-btn" name="status" value="cancel" form="main-form">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </button>
                @elseif($contract->status_id == 2)
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
        'title'         => 'CONTRACT PROPOSALS',
        'route'         => 'contract-proposals',
        'header_var'    => 'id',
        'header_pk'     => $contract->id,
        'detail_var'    => 'id',
        'is_edit'       => 1,
        'status_id'     => $contract->status_id,
        'columns'       =>  [['name' => 'proposal', 'label' => 'PROPOSAL'], ['name' => 'seq', 'label' => 'SEQ'],
        ],
        'details'       => $contract_proposals,
        
    ])@enddindex()

    {{-- <div class="card shadow mb-4">
        <div class="card-header">
            Contract Proposals
        </div>
        <div class="card-body">
            @if($disabled == "0")
            <div class="form d-inline">
                <a href="{{ route('contract-proposals.create', ['id' => $contract->id]) }}"
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
                        <td>PROPOSAL</td>
                        <td>SEQ</td>
                        @if($disabled == "0")
                            <td>ACTIONS</td>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contract_proposals as $contract_proposal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('contract-proposals.show', ['id' => $contract_proposal->id]) }}">{{ sprintf('%08d', $contract_proposal->id) }}</a></td>
                        <td>{{ $contract_proposal->proposal}}</td>
                        <td>{{ $contract_proposal->seq }}</td>
                        @if($disabled == "0")
                        <td>
                            <div class="form d-inline">
                                <a href="{{ route('contract-proposals.edit', ['id' => $contract_proposal->id]) }}" class="btn btn-sm btn-secondary action-btn">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <form method="POST" class="form d-inline " action="{{ route('contract-proposals.destroy', ['id' => $contract_proposal->id]) }} " class="d-inline" id="{{ $contract_proposal->id }}" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="Delete!" class="btn btn-sm btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="{{ $contract_proposal->id }}">
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
    </div> --}}

</div>
@endsection
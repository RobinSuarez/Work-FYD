@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('contracts.index') }}">Contract</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                    @text([
                        'name'      => 'id',
                        'value'     => $contract->id,
                        'disabled'  => 1,
                    ])@endtext

                    @datefield([
                        'name'  => 'date',
                        'value' => old('date') ?? $contract->date,
                        'disabled' => 1,
                    ])@enddatefield

                    @text([
                        'name' => 'no',
                        'value' => old('no') ?? $contract->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => 1,
                    ])@endtext

                    @textarea([
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $contract->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => 1,
                    ])@endtextarea()

                    @select([
                        'name' => 'status_id',
                        'label' => 'STATUS',
                        'elements'  => $statuses,
                        'value' => old('status_id') ?? $contract->status_id,
                        'disabled' => 1,
                    ])@endselect
                
            </div>

            <a href="{{route('contracts.edit', ['contract' => $contract->id])}}" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            Contract Proposals
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>ID</td>
                        <td>PROPOSAL</td>
                        <td>SEQ</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contract_proposals as $contract_proposal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('contract-proposals.show', ['id' => $contract_proposal->id]) }}">{{ sprintf('%08d', $contract_proposal->id) }}</a></td>
                        <td>{{ $contract_proposal->proposal}}</td>
                        <td>{{ $contract_proposal->seq }}</td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
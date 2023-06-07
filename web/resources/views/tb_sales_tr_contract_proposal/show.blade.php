@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('contracts.edit', ['contract' => $contract_proposal->contract_id])}}">Contract Proposal</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                @text([
                        'name'          => 'id',
                        'disabled'      => 1,
                        'value'         => $contract_proposal->id,
                    ])@endtext

                    @text([
                        'name'          => 'contract_id',
                        'value'         => $contract_proposal->contract_id,
                        'disabled'      => 1,
                    ])@endtext

                    @select([
                        'name'          => 'proposal_id',
                        'label'         => 'PROPOSAL',
                        'elements'      => $proposals,
                        'value'         => old('proposal_id') ?? $contract_proposal->proposal_id,
                        'disabled'      => 1,
                    ])@endselect

                    @text([
                        'name'          => 'seq',
                        'placeholder'   => 'Enter the Seq',
                        'value'         => old('seq') ?? $contract_proposal->seq,
                        'disabled'      => 1,
                    ])@endtext

            </div>
            @if($disabled == "0")
            <a href="{{ route('contract-proposals.edit', ['id' => $contract_proposal->id]) }}" class="btn btn-secondary action-btn">
                <i class="fa-solid fa-pencil"></i>
            </a>
            @endif
        </div>
    </div>
</div>
@endsection
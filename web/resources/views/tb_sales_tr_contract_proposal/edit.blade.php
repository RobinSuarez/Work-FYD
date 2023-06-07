@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('contracts.edit', ['contract' => $contract_proposal->contract_id])}}">Contract Proposal</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('contract-proposals.update', ['id'=> $contract_proposal->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endselect

                    @text([
                        'name'          => 'seq',
                        'placeholder'   => 'Enter the Seq',
                        'value'         => old('seq') ?? $contract_proposal->seq,
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
</div>
@endsection
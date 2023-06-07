@extends('layouts.app')
@section('content')\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('contracts.edit', ['contract' => $contract_id])}}">Contract Proposal</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('contract-proposals.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    @text([
                        'name'          => 'id',
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name'          => 'contract_id',
                        'value'         => $contract_id,
                        'disabled'      => 1,
                    ])@endtext

                    @select([
                        'name'          => 'proposal_id',
                        'label'         => 'PROPOSAL',
                        'elements'      => $proposals,
                        'value'         => old('proposal_id'),
                    ])@endselect

                    @text([
                        'name'          => 'seq',
                        'placeholder'   => 'Enter the Seq'
                    ])@endtext
                </div>
                
                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection 
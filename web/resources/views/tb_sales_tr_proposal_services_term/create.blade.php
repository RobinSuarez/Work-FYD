@extends('layouts.app')
@section('content')\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('proposal-services.edit', ['id' => $proposal_service_id])}}" class="text-black text-decoration-none">PROPOSAL SERVICES TERM</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('proposal-services-terms.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-1">
                    @text([
                        'name'          => 'id',
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name'          => 'proposal_services_id',
                        'value'         => $proposal_service_id,
                        'disabled'      => 1,
                    ])@endtext

                    @datefield([
                        'name'          => 'due_date',
                        'value'         => old('due_date') ?? $def_date
                    ])@enddatefield

                    @text([
                        'name'          => 'amount',
                        'value'         => old('amount') ?? 0,
                        'placeholder'   => 'Enter the Amount',
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
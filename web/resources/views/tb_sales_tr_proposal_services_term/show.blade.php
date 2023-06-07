@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('proposal-services.edit', ['id' => $proposal_services_term->proposal_services_id])}}" class="text-black text-decoration-none">PROPOSAL SERVICES TERM</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-3">
                @text([
                    'name'          => 'id',
                    'disabled'      => 1,
                    'value'         => $proposal_services_term->id,
                ])@endtext

                @text([
                    'name'          => 'proposal_services_id',
                    'value'         => $proposal_services_term->proposal_services_id,
                    'disabled'      => 1,
                ])@endtext

                @datefield([
                    'name'          => 'due_date', 
                    'value'         => old('due_date') ?? $proposal_services_term->due_date,
                    'disabled'      => 1,
                ])@enddatefield

                @text([
                    'name'          => 'amount',
                    'value'         => old('amount') ?? $proposal_services_term->amount,
                    'placeholder'   => 'Enter the Amount',
                    'type'          => 'number',
                    'disabled'      => 1,
                ])@endtext
            </div>
            @if(($status_id ?? 0) == 1)
            <a href="{{ route('proposal-services-terms.edit', ['id' => $proposal_services_term->id]) }}" class="btn btn-sm btn-secondary action-btn"><i class="fa-solid fa-pencil"></i></a>
            @endif
        </div>
    </div>
</div>
@endsection
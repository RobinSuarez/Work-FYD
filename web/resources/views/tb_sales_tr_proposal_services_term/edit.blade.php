@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('proposal-services.edit', ['id' => $proposal_services_term->proposal_services_id])}}" class="text-black text-decoration-none">PROPOSAL SERVICES TERM</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('proposal-services-terms.update', ['id'=> $proposal_services_term->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-1"> 
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
                        'disabled'      => ($status_id ?? 0) == 1 ? null : 1,
                    ])@enddatefield

                    @text([
                        'name'          => 'amount',
                        'value'         => old('amount') ?? $proposal_services_term->amount,
                        'placeholder'   => 'Enter the Amount',
                        'type'          => 'number',
                        'disabled'      => ($status_id ?? 0) == 1 ? null : 1,
                    ])@endtext
                </div>
                @if(($status_id ?? 0) == 1)
                <button type="submit" class="btn btn-sm btn-secondary">
                    Submit
                </button>
                @endif

            </form>
        </div>
    </div>
</div>
@endsection
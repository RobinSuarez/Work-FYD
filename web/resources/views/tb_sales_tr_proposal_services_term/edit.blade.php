@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('proposal-services.edit', ['id' => $proposal_services_term->proposal_services_id])}}">Proposal Service Term</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('proposal-services-terms.update', ['id'=> $proposal_services_term->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4"> 
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
                        'disabled'  => isset($disabled) ? $disabled : null,
                    ])@enddatefield

                    @text([
                        'name'          => 'amount',
                        'value'         => old('amount') ?? $proposal_services_term->amount,
                        'placeholder'   => 'Enter the Amount',
                        'type'          => 'number',
                        'disabled'  => isset($disabled) ? $disabled : null,
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
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('ors.edit', ['or' => $or_pay_cash->or_id])}}">OR Pay Cash</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                @text([
                        'name'          => 'id',
                        'disabled'      => 1,
                        'value'         => $or_pay_cash->id,
                    ])@endtext

                    @text([
                        'name'          => 'or_id',
                        'value'         => $or_pay_cash->or_id,
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name'          => 'amount',
                        'value'         => old('amount') ?? $or_pay_cash->amount,
                        'placeholder'   => 'Enter the amount',
                        'type'          => 'number',
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name' => 'ref_no',
                        'value' => old('ref_no') ?? $or_pay_cash->ref_no,
                        'placeholder' => 'Enter the Ref No',
                        'disabled'      => 1,
                    ])@endtext

                    @datefield([
                        'name'          => 'ref_date',
                        'value'         => old('ref_date') ?? $or_pay_cash->ref_date,
                        'disabled'      => 1,
                    ])@enddatefield

                    @textarea([
                        'name'          => 'remarks',
                        'value'         => old('remarks') ?? $or_pay_cash->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled'      => 1,
                    ])@endtextarea()

            </div>
            @if($disabled == "0")
            <a href="{{ route('or-pay-cashes.edit', ['id' => $or_pay_cash->id]) }}" class="btn btn-secondary action-btn">
                <i class="fa-solid fa-pencil"></i>
            </a>
            @endif
        </div>
    </div>
</div>
@endsection
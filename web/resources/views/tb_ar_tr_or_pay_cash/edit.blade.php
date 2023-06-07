@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('ors.edit', ['or' => $or_pay_cash->or_id])}}">OR Pay Cash</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('or-pay-cashes.update', ['id'=> $or_pay_cash->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endtext

                    @text([
                        'name' => 'ref_no',
                        'value' => old('ref_no') ?? $or_pay_cash->ref_no,
                        'placeholder' => 'Enter the Ref No',
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endtext

                    @datefield([
                        'name'  => 'ref_date',
                        'value' => old('ref_date') ?? $or_pay_cash->ref_date,
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@enddatefield

                    @textarea([
                        'name'          => 'remarks',
                        'value'         => old('remarks') ?? $or_pay_cash->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endtextarea()

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
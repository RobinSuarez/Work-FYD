@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('ors.edit', ['or' => $or_pay_check->or_id])}}">OR Pay Check</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('or-pay-checks.update', ['id'=> $or_pay_check->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4"> 

                    @text([
                        'name'          => 'id',
                        'disabled'      => 1,
                        'value'         => $or_pay_check->id,
                    ])@endtext

                    @text([
                        'name'          => 'or_id',
                        'value'         => $or_pay_check->or_id,
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name' => 'check_no',
                        'value' => old('check_no') ?? $or_pay_check->check_no,
                        'placeholder' => 'Enter the Check No',
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endtext

                    @datefield([
                        'name'  => 'check_date',
                        'value' => old('check_date') ?? $or_pay_check->check_date,
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@enddatefield

                    @select([
                        'name'      => 'bank_id',
                        'label'     => 'BANK',
                        'elements'  => $banks,
                        'value'     => old('bank_id') ?? $or_pay_check->bank_id,
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endselect

                    @text([
                        'name'          => 'amount',
                        'value'         => old('amount') ?? $or_pay_check->amount,
                        'placeholder'   => 'Enter the amount',
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ])@endtext

                   
                    @textarea([
                        'name'          => 'remarks',
                        'value'         => old('remarks') ?? $or_pay_check->remarks,
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
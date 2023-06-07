@extends('layouts.app')
@section('content')\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('ors.edit', ['or' => $or_id])}}">OR Pay Check</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('or-pay-checks.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    @text([
                        'name'          => 'id',
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name'          => 'or_id',
                        'value'         => $or_id,
                        'disabled'      => 1,
                    ])@endtext

                    @text([
                        'name' => 'check_no',
                        'value' => old('check_no'),
                        'placeholder' => 'Enter the Check No'
                    ])@endtext

                    @datefield([
                        'name'  => 'check_date',
                        'value' => old('check_date') ?? $def_date,
                    ])@enddatefield

                    @select([
                        'name'      => 'bank_id',
                        'label'     => 'BANK',
                        'elements'  => $banks,
                        'value'     => old('bank_id')
                    ])@endselect

                    @text([
                        'name'          => 'amount',
                        'value'         => old('amount'),
                        'placeholder'   => 'Enter the amount',
                    ])@endtext

                    

                    @textarea([
                        'name'          => 'remarks',
                        'value'         => old('remarks'),
                        'placeholder'   => 'Enter the REMARKS',
                    ])@endtextarea()


                </div>
                
                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection 
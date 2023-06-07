@extends('layouts.app')
@section('content')\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('ors.edit', ['or' => $or_id])}}">OR Pay Cash</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('or-pay-cashes.store')}}" enctype="multipart/form-data">
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
                        'name'          => 'amount',
                        'value'         => old('amount'),
                        'placeholder'   => 'Enter the amount',
                        'type'          => 'number',
                    ])@endtext

                    @text([
                        'name' => 'ref_no',
                        'value' => old('ref_no'),
                        'placeholder' => 'Enter the Ref No'
                    ])@endtext

                    @datefield([
                        'name'  => 'ref_date',
                        'value' => old('ref_date') ?? $def_date,
                    ])@enddatefield

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
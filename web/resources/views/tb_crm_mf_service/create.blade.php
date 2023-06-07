@extends('layouts.app')
@section('content')\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('services.index') }}">Services</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('services.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    @text([
                        'name' => 'id',
                        'disabled' => 1,
                    ])@endtext
                    @text([
                        'name' => 'code',
                        'value' => old('code'),
                        'placeholder' => 'Enter your code'
                    ])@endtext

                    @text([
                        'name' => 'name',
                        'value' => old('name'),
                        'placeholder' => 'Enter your name'
                    ])@endtext

                    @select([
                        'name' => 'uom_id',
                        'label' => 'UOM',
                        'elements'  => $uoms,
                        'value'     => old('uom_id')
                    ])@endselect

                    @text([
                        'name' => 'price',
                        'type'  => 'number',
                        'value' => old('price') ?? number_format(0, 2),
                        'placeholder' => 'Enter the Price'
                    ])@endtext

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        @checkbox([
                            'name' => 'is_active',
                            'value' => old('is_active') ?? 1
                        ])@endcheckbox()
                    </div>
                </div>
                
                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection 
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('services.index') }}">Services</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('services.update', ['service'=> $service->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    @text([
                        'name' => 'id',
                        'value' => $service->id,
                        'disabled' => 1,
                    ])@endtext

                    @text([
                        'name' => 'code',
                        'value' => old('code') ?? $service->code,
                        'placeholder' => 'Enter your code'
                    ])@endtext

                    @text([
                        'name' => 'name',
                        'value' => old('name') ?? $service->name,
                        'placeholder' => 'Enter your name'
                    ])@endtext

                    @select([
                        'name' => 'uom_id',
                        'label' => 'UOM',
                        'elements'  => $uoms,
                        'value'     => old('uom_id') ?? $service->uom_id,
                    ])@endselect

                    @text([
                        'name' => 'price',
                        'type'  => 'number',
                        'value' => old('price') ?? number_format($service->price, 2),
                        'placeholder' => 'Enter the Price'
                    ])@endtext

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        @checkbox([
                            'name' => 'is_active',
                            'value' => old('is_active') ?? $service->is_active,
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
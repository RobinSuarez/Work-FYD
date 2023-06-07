@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('services.index') }}">Services</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                
                @text([
                    'name' => 'id',
                    'value' => $service->id,
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'code',
                    'value' => $service->code,
                    'placeholder' => 'Enter your code',
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'name',
                    'value' => $service->name,
                    'placeholder' => 'Enter your name',
                    'disabled' => 1,
                ])@endtext

                @select([
                    'name' => 'uom_id',
                    'label' => 'UOM',
                    'elements'  => $uoms,
                    'value'     => old('uom_id') ?? $service->uom_id,
                    'disabled' => 1,
                ])@endselect

                @text([
                    'name' => 'price',
                    'type'  => 'number',
                    'value' => old('price') ?? number_format($service->price, 2),
                    'placeholder' => 'Enter the Price',
                    'disabled' => 1,
                ])@endtext
    
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    @checkbox([
                        'name' => 'is_active',
                        'value' => $service->is_active,
                        'disabled' => 1,
                    ])@endcheckbox()
                </div>
                
            </div>
            <a href="{{route('services.edit', ['service' => $service->id])}}" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
@endsection
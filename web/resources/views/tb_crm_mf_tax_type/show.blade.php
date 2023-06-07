@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('tax-types.index') }}">Tax Types</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                
                @text([
                    'name' => 'id',
                    'value' => $tax_type->id,
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'code',
                    'value' => $tax_type->code,
                    'placeholder' => 'Enter your code',
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'name',
                    'value' => $tax_type->name,
                    'placeholder' => 'Enter your name',
                    'disabled' => 1,
                ])@endtext
    
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    @checkbox([
                        'name' => 'is_active',
                        'value' => $tax_type->is_active,
                        'disabled' => 1,
                    ])@endcheckbox()
                </div>
                
            </div>
            <a href="{{route('tax-types.edit', ['tax_type' => $tax_type->id])}}" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
@endsection
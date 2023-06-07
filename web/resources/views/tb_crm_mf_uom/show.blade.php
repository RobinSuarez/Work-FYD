@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('uoms.index') }}">Unit of Measure</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                
                @text([
                    'name' => 'id',
                    'value' => $uom->id,
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'code',
                    'value' => $uom->code,
                    'placeholder' => 'Enter your code',
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'name',
                    'value' => $uom->name,
                    'placeholder' => 'Enter your name',
                    'disabled' => 1,
                ])@endtext
    
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    @checkbox([
                        'name' => 'is_active',
                        'value' => $uom->is_active,
                        'disabled' => 1,
                    ])@endcheckbox()
                </div>
                
            </div>
            <a href="{{route('uoms.edit', ['uom' => $uom->id])}}" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('areas.index') }}" class="text-black text-decoration-none">AREAS</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-3">
                
                @text([
                    'name' => 'id',
                    'value' => $area->id,
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'code',
                    'value' => $area->code,
                    'placeholder' => 'Enter your code',
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'name',
                    'value' => $area->name,
                    'placeholder' => 'Enter your name',
                    'disabled' => 1,
                ])@endtext
    
                <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                    @checkbox([
                        'name' => 'is_active',
                        'value' => $area->is_active,
                        'disabled' => 1,
                    ])@endcheckbox()
                </div>
                
            </div>
            <a href="{{route('areas.edit', ['area' => $area->id])}}" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
@endsection
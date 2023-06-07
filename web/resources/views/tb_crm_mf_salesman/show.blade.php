@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('salesmen.index') }}" class="text-black text-decoration-none">SALESMAN</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-3">
                
                @text([
                    'name' => 'id',
                    'value' => $salesman->id,
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'code',
                    'value' => $salesman->code,
                    'placeholder' => 'Enter your code',
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'name',
                    'value' => $salesman->name,
                    'placeholder' => 'Enter your name',
                    'disabled' => 1,
                ])@endtext
    
                <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                    @checkbox([
                        'name' => 'is_active',
                        'value' => $salesman->is_active,
                        'disabled' => 1,
                    ])@endcheckbox()
                </div>
                
            </div>
            <a href="{{route('salesmen.edit', ['salesman' => $salesman->id])}}" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
@endsection
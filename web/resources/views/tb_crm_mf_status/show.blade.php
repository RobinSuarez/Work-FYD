@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('statuses.index') }}">Status</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                
                @text([
                    'name' => 'id',
                    'value' => $status->id,
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'code',
                    'value' => $status->code,
                    'placeholder' => 'Enter your code',
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'name',
                    'value' => $status->name,
                    'placeholder' => 'Enter your name',
                    'disabled' => 1,
                ])@endtext
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    @checkbox([
                        'name' => 'is_for_posting',
                        'value' => old('is_for_posting') ?? $status->is_for_posting,
                        'disabled' => 1,
                    ])@endcheckbox()
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    @checkbox([
                        'name' => 'is_cancelled',
                        'value' => old('is_cancelled') ?? $status->is_cancelled,
                        'disabled' => 1,
                    ])@endcheckbox()
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    @checkbox([
                        'name' => 'is_posted',
                        'value' => old('is_posted') ?? $status->is_posted,
                        'disabled' => 1,
                    ])@endcheckbox()
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    @checkbox([
                        'name' => 'is_active',
                        'value' => $status->is_active,
                        'disabled' => 1,
                    ])@endcheckbox()
                </div>
                
            </div>
            <a href="{{route('statuses.edit', ['status' => $status->id])}}" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
@endsection
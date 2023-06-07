@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('statuses.index') }}">Status</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('statuses.update', ['status'=> $status->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    @text([
                        'name' => 'id',
                        'value' => $status->id,
                        'disabled' => 1,
                    ])@endtext
                    @text([
                        'name' => 'code',
                        'value' => old('code') ?? $status->code,
                        'placeholder' => 'Enter your code'
                    ])@endtext
                    @text([
                        'name' => 'name',
                        'value' => old('name') ?? $status->name,
                        'placeholder' => 'Enter your name'
                    ])@endtext
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        @checkbox([
                            'name' => 'is_for_posting',
                            'value' => old('is_for_posting') ?? $status->is_for_posting,
                        ])@endcheckbox()
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        @checkbox([
                            'name' => 'is_cancelled',
                            'value' => old('is_cancelled') ?? $status->is_cancelled,
                        ])@endcheckbox()
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        @checkbox([
                            'name' => 'is_posted',
                            'value' => old('is_posted') ?? $status->is_posted,
                        ])@endcheckbox()
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        @checkbox([
                            'name' => 'is_active',
                            'value' => old('is_active') ?? $status->is_active,
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
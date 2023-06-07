@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('areas.index') }}" class="text-black text-decoration-none">AREAS</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('areas.update', ['area'=> $area->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    @text([
                        'name' => 'id',
                        'value' => $area->id,
                        'disabled' => 1,
                    ])@endtext
                    @text([
                        'name' => 'code',
                        'value' => old('code') ?? $area->code,
                        'placeholder' => 'Enter your code'
                    ])@endtext
                    @text([
                        'name' => 'name',
                        'value' => old('name') ?? $area->name,
                        'placeholder' => 'Enter your name'
                    ])@endtext
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        @checkbox([
                            'name' => 'is_active',
                            'value' => old('is_active') ?? $area->is_active,
                        ])@endcheckbox()
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
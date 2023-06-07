@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('uoms.index') }}">Unit of Measure</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('uoms.update', ['uom'=> $uom->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    @text([
                        'name' => 'id',
                        'value' => $uom->id,
                        'disabled' => 1,
                    ])@endtext
                    @text([
                        'name' => 'code',
                        'value' => old('code') ?? $uom->code,
                        'placeholder' => 'Enter your code'
                    ])@endtext
                    @text([
                        'name' => 'name',
                        'value' => old('name') ?? $uom->name,
                        'placeholder' => 'Enter your name'
                    ])@endtext
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        @checkbox([
                            'name' => 'is_active',
                            'value' => old('is_active') ?? $uom->is_active,
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
@extends('layouts.app')
@section('content')\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('salesmen.index') }}" class="text-black text-decoration-none">SALESMAN</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('salesmen.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    @text([
                        'name' => 'id',
                        'disabled' => 1,
                    ])@endtext
                    @text([
                        'name' => 'code',
                        'value' => old('code'),
                        'placeholder' => 'Enter your code'
                    ])@endtext
                    @text([
                        'name' => 'name',
                        'value' => old('name'),
                        'placeholder' => 'Enter your name'
                    ])@endtext
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        @checkbox([
                            'name' => 'is_active',
                            'value' => old('is_active') ?? 1
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
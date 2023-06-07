@extends('layouts.app')
@section('content')\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('clients.index') }}" class="text-black text-decoration-none">CLIENTS</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('clients.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-1">
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
                    
                    @text([
                        'name' => 'address',
                        'value' => old('address'),
                        'placeholder' => 'Enter your address'
                    ])@endtext

                    @select([
                        'name' => 'area_id',
                        'label' => 'AREA',
                        'elements'  => $areas,
                        'value'     => old('area_id')
                    ])@endselect

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
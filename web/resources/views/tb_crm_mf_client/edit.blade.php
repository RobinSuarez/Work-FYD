@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('clients.index') }}" class="text-black text-decoration-none">CLIENTS</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('clients.update', ['client'=> $client->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-1">
                    @text([
                        'name' => 'id',
                        'value' => $client->id,
                        'disabled' => 1,
                    ])@endtext
                    @text([
                        'name' => 'code',
                        'value' => old('code') ?? $client->code,
                        'placeholder' => 'Enter your code'
                    ])@endtext
                    @text([
                        'name' => 'name',
                        'value' => old('name') ?? $client->name,
                        'placeholder' => 'Enter your name'
                    ])@endtext
                    @text([
                        'name' => 'address',
                        'value' => old('address') ?? $client->address,
                        'placeholder' => 'Enter your address'
                    ])@endtext

                    @select([
                        'name' => 'area_id',
                        'label' => 'AREA',
                        'elements'  => $areas,
                        'value'     => old('area_id') ?? $client->area_id,
                    ])@endselect
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        @checkbox([
                            'name' => 'is_active',
                            'value' => old('is_active') ?? $client->is_active,
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
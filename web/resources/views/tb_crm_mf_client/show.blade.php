@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('clients.index') }}" class="text-black text-decoration-none">CLIENTS</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-1">
                
                @text([
                    'name' => 'id',
                    'value' => $client->id,
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'code',
                    'value' => $client->code,
                    'placeholder' => 'Enter your code',
                    'disabled' => 1,
                ])@endtext
    
                @text([
                    'name' => 'name',
                    'value' => $client->name,
                    'placeholder' => 'Enter your name',
                    'disabled' => 1,
                ])@endtext

                @text([
                    'name' => 'address',
                    'value' => old('address') ?? $client->address,
                    'placeholder' => 'Enter your address',
                    'disabled' => 1,
                ])@endtext

                @select([
                    'name' => 'area_id',
                    'label' => 'AREA',
                    'elements'  => $areas,
                    'value'     => old('area_id') ?? $client->area_id,
                    'disabled' => 1,
                ])@endselect
    
                <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                    @checkbox([
                        'name' => 'is_active',
                        'value' => $client->is_active,
                        'disabled' => 1,
                    ])@endcheckbox()
                </div>
                
            </div>
            <a href="{{route('clients.edit', ['client' => $client->id])}}" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
@endsection
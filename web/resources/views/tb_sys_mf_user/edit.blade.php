@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('users.index') }}" class="text-black text-decoration-none">USERS</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('users.update', ['user'=> $user->id])}}" enctype="multipart/form-data" id="main-form">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    @text([
                        'name' => 'id',
                        'value' => $user->id,
                        'disabled' => 1,
                    ])@endtext
                    
                    @text([
                        'name' => 'code',
                        'value' => old('code') ?? $user->code,
                        'placeholder' => 'Enter your code'
                    ])@endtext

                    @text([
                        'name' => 'name',
                        'value' => old('name') ?? $user->name,
                        'placeholder' => 'Enter your name'
                    ])@endtext

                    @email([
                        'name' => 'email',
                        'value' => old('email') ?? $user->email,
                        'placeholder' => 'Enter your email',
                    ])@endtext()

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        @checkbox([
                            'name' => 'is_active',
                            'value' => old('is_active') ?? $user->is_active,
                        ])@endcheckbox()
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary" form="main-form">
                    Submit
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
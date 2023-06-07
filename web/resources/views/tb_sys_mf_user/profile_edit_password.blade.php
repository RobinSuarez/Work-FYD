@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('users.index') }}" class="text-black text-decoration-none">USERS</a> | ACCOUNT PROFILE</div>
        <div class="card-body">
            <form method="POST" action="{{route('users.profile-update-password', ['user'=> $user->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row mb-4 ">
                    @password([
                        'name'          => 'password',
                        'value'         => old('password'),
                        'placeholder'   => 'Enter your password',
                    ])@endpassword()

                    @password([
                        'name'          => 'cf_password',
                        'label'         => 'CONFIRM PASSWORD',
                        'value'         => old('cf_password'),
                        'placeholder'   => 'Confirm your password',
                    ])@endpassword()
                </div>
                <button type="submit" class="btn btn-sm btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>



@endsection
@extends('layouts.app')
@section('head')
    @select2head
    @endselect2head
@endsection
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('soas.index') }}">Statement of Account</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('soas.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    @text([
                        'name' => 'id',
                        'disabled' => 1,
                    ])@endtext

                    @datefield([
                        'name'  => 'date',
                        'value' => old('date') ?? $def_date,
                    ])@enddatefield

                    @text([
                        'name' => 'no',
                        'value' => old('no'),
                        'placeholder' => 'Enter the NO'
                    ])@endtext

                    @select([
                        'name'      => 'client_id',
                        'label'     => 'CLIENTS',
                        'elements'  => $clients,
                        'value'     => old('client_id')
                    ])@endselect

                    @textarea([
                        'name'          => 'remarks',
                        'value'         => old('remarks'),
                        'placeholder'   => 'Enter the REMARKS'
                    ])@endtextarea()

                    @select([
                        'name' => 'status_id',
                        'label' => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id'),
                        'disabled'  => 1
                    ])@endselect
                </div>
                
                <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save">
                    <i class="fa-solid fa-floppy-disk"></i> Save
                </button>
    
                {{-- <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="post">
                    <i class="fa-solid fa-check-to-slot"></i> Post
                </button> --}}
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});

        @select2js([
            'column'        => 'client_id',
            'placeholder'   => 'Select the client',
            'model_path'    => 'App\Models\tb_crm_mf_client',
        ])@endselect2js
</script>
@endsection
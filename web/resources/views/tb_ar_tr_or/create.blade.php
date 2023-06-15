@extends('layouts.app')
@section('head')
    @select2head
    @endselect2head
@endsection
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('ors.index') }}">OR</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('ors.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-1">
                    @text([
                        'name'      => 'id',
                        'disabled'  => 1,
                    ])@endtext

                    @text([
                        'name'          => 'no',
                        'value'         => old('no'),
                        'placeholder'   => 'Enter the NO'
                    ])@endtext

                    @datefield([
                        'name'      => 'date',
                        'value'     => old('date') ?? $def_date,
                    ])@enddatefield

                    @select([
                        'name'      => 'client_id',
                        'label'     => 'CLIENTS',
                        'elements'  => $clients,
                        'value'     => old('client_id')
                    ])@endselect

                    @text([
                        'name'          => 'total_cash_amount',
                        'value'         => old('total_cash_amount') ?? number_format(0, 2),
                        'placeholder'   => 'Enter the total_cash_amount',
                        'type'          => 'number',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_check_amount',
                        'value'         => old('total_check_amount')?? number_format(0, 2),
                        'placeholder'   => 'Enter the total_check_amount',
                        'type'          => 'number',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_pay_amount',
                        'value'         => old('total_pay_amount')?? number_format(0, 2),
                        'placeholder'   => 'Enter the total_check_amount',
                        'type'          => 'number',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_applied',
                        'value'         => old('total_applied')?? number_format(0, 2),
                        'placeholder'   => 'Enter the total_applied',
                        'type'          => 'number',
                        'disabled'      => 1
                    ])@endtext

                    @text([
                        'name'          => 'total_excess',
                        'value'         => old('total_excess')?? number_format(0, 2),
                        'placeholder'   => 'Enter the total_excess',
                        'type'          => 'number',
                        'disabled'      => 1
                    ])@endtext

                    @textarea([
                        'name'          => 'remarks',
                        'value'         => old('remarks'),
                        'placeholder'   => 'Enter the REMARKS'
                    ])@endtextarea()

                    @select([
                        'name'      => 'status_id',
                        'label'     => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id'),
                        'disabled'  => 1
                    ])@endselect
                </div>
                
                <button type="submit" class="btn btn-sm btn-secondary mt-1 btn-user form-btn" name="status" value="save">
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
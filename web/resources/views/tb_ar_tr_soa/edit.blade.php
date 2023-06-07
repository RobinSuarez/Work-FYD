@extends('layouts.app')
@section('head')
    @select2head
    @endselect2head
@endsection
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('soas.index') }}">Statement of Account</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('soas.update', ['soa'=> $soa->id])}}" enctype="multipart/form-data" id="main-form">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    @text([
                        'name' => 'id',
                        'value' => $soa->id,
                        'disabled' => 1,
                    ])@endtext

                    @datefield([
                        'name'  => 'date',
                        'value' => old('date') ?? $soa->date,
                        'disabled' => $disabled
                    ])@enddatefield

                    @text([
                        'name' => 'no',
                        'value' => old('no') ?? $soa->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => $disabled
                    ])@endtext

                    @select([
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => old('client_id') ?? $soa->client_id,
                        'disabled' => $disabled
                    ])@endselect

                    @textarea([
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $soa->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => $disabled
                    ])@endtextarea()

                    @select([
                        'name'      => 'status_id',
                        'label'     => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id') ?? $soa->status_id,
                        'disabled'  => 1
                    ])@endselect
                </div>

                @if ($soa->status_id == 1)
                    <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Save
                    </button>
                    
                    <button type="submit" class="btn btn-success mt-4 btn-user form-btn" name="status" value="post" form="main-form">
                        <i class="fa-solid fa-check-to-slot"></i> Post
                    </button>

                    <button type="submit" class="btn btn-danger mt-4 btn-user form-btn" name="status" value="cancel" form="main-form">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </button>
                @elseif($soa->status_id == 2)
                    <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Change
                    </button>

                @else
                    <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Change
                    </button>

                @endif
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            SOA Application
        </div>
        <div class="card-body">
            @if($disabled == "0")
            <div class="form d-inline">
                <a href="{{ route('soa-apps.searcher', ['id' => $soa->id]) }}"
                    class="btn btn-secondary mb-3 create-btn">
                    <i class="fa-solid fa-magnifying-glass"></i> Searcher
                </a>
            </div>
            @endif
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>ID</td>
                        <td>AR LR CUST ID</td>
                        <td>CLIENT</td>
                        <td>PROPOSAL</td>
                        <td>CONTRACT</td>
                        <td>DUE DATE</td>
                        <td>SERVICE</td>
                        <td>AMOUNT</td>
                        @if($disabled == "0")
                            <td>ACTIONS</td>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($soa_apps as $soa_app)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ sprintf('%08d', $soa_app->id) }}</td>
                        <td>{{ sprintf('%08d', $soa_app->ar_lr_cust_id) }}</td>
                        <td>{{ $soa_app->client_name}}</td>
                        <td>{{ $soa_app->proposal_no }}</td>
                        <td>{{ $soa_app->contract_no }}</td>
                        <td>{{ $soa_app->due_date }}</td>
                        <td>{{ $soa_app->service_name }}</td>
                        <td>{{ number_format($soa_app->amount, 2)}}</td>
                        @if($disabled == "0")
                        <td>
                            <form method="POST" class="form d-inline " action="{{ route('soa-apps.destroy', ['id' => $soa_app->id]) }} " class="d-inline" id="{{ $soa_app->id }}" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="{{ $soa_app->id }}">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
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
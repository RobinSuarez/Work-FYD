@extends('layouts.app')
@section('content')\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('proposals.index') }}" class="text-black text-decoration-none">PROPOSALS</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('proposals.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    @text([
                        'name' => 'id',
                        'disabled' => 1,
                    ])@endtext

                    @datefield([
                        'name'  => 'date'
                    ])@enddatefield

                    @text([
                        'name' => 'no',
                        'value' => old('no'),
                        'placeholder' => 'Enter the NO'
                    ])@endtext

                    @select([
                        'name' => 'client_id',
                        'label' => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => old('client_id')
                    ])@endselect

                    @select([
                        'name' => 'salesman_id',
                        'label' => 'SALESMAN',
                        'elements'  => $salesmen,
                        'value'     => old('salesman_id')
                    ])@endselect

                    @select([
                        'name' => 'company_id',
                        'label' => 'COMPANY',
                        'elements'  => $companies,
                        'value'     => old('company_id')
                    ])@endselect

                    @text([
                        'name' => 'version_id',
                        'label' => 'VERSION',
                        'value' => old('version_id') ?? 1,
                        'placeholder'   => 'Enter the VERSION No.' 
                    ])@endtext

                    @text([
                        'name' => 'amount',
                        'value' => number_format(0, 2),
                        'disabled' => 1,
                    ])@endtext

                    @select([
                        'name' => 'tax_type_id',
                        'label' => 'TAX TYPE',
                        'elements'  => $tax_types,
                        'value'     => old('tax_type_id')
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
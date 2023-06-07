@extends('layouts.app')
@section('content')\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('contracts.index') }}" class="text-black text-decoration-none">CONTRACTS</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('contracts.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-1">
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
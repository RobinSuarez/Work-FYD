@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            FILTERS
        </div>
        <div class="card-body">
            <form method="GET" action="{{route('ors.index')}}" >
                @csrf
                <div class="form d-inline mb-3">
                    @text([
                        'name' => 'no',
                        'placeholder' => 'Enter the No',
                        'col'   => 'col-lg-4 col-md-6 col-sm-12 px-0',
                        'label_class' => ''
                    ])@endtext
                    <button type="submit" class="btn btn-secondary form-btn mt-3"><i class="far fa-search" style="font-weight: 900"></i> Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mt-3 mb-3">
        <div class="card-header">
            <a href="{{ route('ors.index') }}">OR</a>
        </div>
        <div class ="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>@sortablelink('id', 'ID')</td>
                        <td>@sortablelink('no', 'NO')</td>
                        <td>@sortablelink('date', 'DATE')</td>
                        <td>@sortablelink('client', 'CLIENT')</td>
                        <td>@sortablelink('status', 'STATUS')</td>
                        <td>@sortablelink('remarks', 'REMARKS')</td>
                        <td>ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ors as $or)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('ors.show', ['or' => $or->id]) }}">{{ sprintf('%08d', $or->id) }}</a></td>
                            <td>{{ $or->no }}</td>
                            <td>{{ $or->date }}</td>
                            <td>{{ $or->client }}</td>
                            <td>{{ $or->status }}</td>
                            <td>{{ $or->remarks }}</td>
                            {{-- <td><input class="form-check-input" type="checkbox" value="1" {{ ($or->is_active??0) == 1 ? "checked":""}} disabled></td> --}}
                            <td>
                                <div class="form d-inline">
                                    <a href="{{ route('ors.edit', ['or' => $or->id]) }}" class="btn btn-secondary action-btn">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                                <form method="POST" class="form d-inline "
                                    action="{{ route('ors.destroy', ['or' => $or->id]) }} " class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
    
            <div class="form d-inline">
                <a href="{{ route('ors.create') }}"
                    class="btn btn-secondary mb-3 create-btn">
                    <i class="fa-regular fa-plus"></i> New Record
                </a>
            </div>
             {!! $ors->appends(\Request::except('page'))->render() !!} 
        </div>
    </div>
</div>

@endsection 
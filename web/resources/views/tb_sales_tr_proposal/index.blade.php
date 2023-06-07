@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            FILTERS
        </div>
        <div class="card-body">
            <form method="GET" action="{{route('proposals.index')}}" >
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
            <a href="{{ route('proposals.index') }}">Proposals</a>
        </div>
        <div class ="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>@sortablelink('id', 'ID')</td>
                        <td>@sortablelink('date', 'DATE')</td>
                        <td>@sortablelink('no', 'NO')</td>
                        <td>@sortablelink('client', 'CLIENT')</td>
                        <td>@sortablelink('company', 'COMPANY')</td>
                        <td>@sortablelink('version_id', 'VERSION')</td>
                        <td>@sortablelink('amount', 'AMOUNT')</td>
                        <td>@sortablelink('tax_type', 'TAX TYPE')</td>
                        <td>@sortablelink('status', 'STATUS')</td>
                        <td>@sortablelink('remarks', 'REMARKS')</td>
                        <td>ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proposals as $proposal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('proposals.show', ['proposal' => $proposal->id]) }}">{{ sprintf('%08d', $proposal->id) }}</a></td>
                            <td>{{ $proposal->date }}</td>
                            <td>{{ $proposal->no }}</td>
                            <td>{{ $proposal->client }}</td>
                            <td>{{ $proposal->company }}</td>
                            <td>{{ $proposal->version_id }}</td>
                            <td>{{ number_format($proposal->amount, 2) }}</td>
                            <td>{{ $proposal->tax_type }}</td>
                            <td>{{ $proposal->status }}</td>
                            <td>{{ $proposal->remarks }}</td>
                            {{-- <td><input class="form-check-input" type="checkbox" value="1" {{ ($proposal->is_active??0) == 1 ? "checked":""}} disabled></td> --}}
                            <td>
                                <div class="form d-inline">
                                    <a href="{{ route('proposals.edit', ['proposal' => $proposal->id]) }}" class="btn btn-secondary action-btn">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                                <form method="POST" class="form d-inline "
                                    action="{{ route('proposals.destroy', ['proposal' => $proposal->id]) }} " class="d-inline">
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
                <a href="{{ route('proposals.create') }}"
                    class="btn btn-secondary mb-3 create-btn">
                    <i class="fa-regular fa-plus"></i> New Record
                </a>
            </div>
             {!! $proposals->appends(\Request::except('page'))->render() !!} 
        </div>
    </div>
</div>

@endsection 
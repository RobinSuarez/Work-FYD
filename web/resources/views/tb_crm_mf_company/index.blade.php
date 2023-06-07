@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            FILTERS
        </div>
        <div class="card-body">
            <form method="GET" action="{{route('companies.index')}}" >
                @csrf
                <div class="form d-inline mb-3">
                    @text([
                        'name' => 'name',
                        'placeholder' => 'Enter the Name',
                        'col'   => 'col-lg-4 col-md-6 col-sm-12 px-0',
                        'label_class' => ''
                    ])@endtext
                    <button type="submit" class="btn btn-sm btn-secondary form-btn mt-3"><i class="far fa-search" style="font-weight: 900"></i> Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mt-3 mb-3">
        <div class="card-header">
            <a href="{{ route('companies.index') }}" class="text-black text-decoration-none">COMPANIES</a>
        </div>
        <div class ="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>@sortablelink('id', 'ID')</td>
                        <td>@sortablelink('code', 'CODE')</td>
                        <td>@sortablelink('name', 'NAME')</td>
                        <td>@sortablelink('is_active', 'IS ACTIVE')</td>
                        <td>ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $company)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('companies.show', ['company' => $company->id]) }}">{{ sprintf('%08d', $company->id) }}</a></td>
                            <td>{{ $company->code }}</td>
                            <td>{{ $company->name }}</td>
                            <td><input class="form-check-input" type="checkbox" value="1" {{ ($company->is_active??0) == 1 ? "checked":""}} disabled></td>
                            <td>
                                <div class="form d-inline">
                                    <a href="{{ route('companies.edit', ['company' => $company->id]) }}" class="btn btn-sm btn-secondary action-btn">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                                <form method="POST" class="form d-inline "
                                    action="{{ route('companies.destroy', ['company' => $company->id]) }} " class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" value="Delete!" class="btn btn-sm btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')">
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
                <a href="{{ route('companies.create') }}"
                    class="btn btn-sm btn-secondary mb-1 create-btn">
                    <i class="fa-regular fa-plus"></i> New Record
                </a>
            </div>
             {!! $companies->appends(\Request::except('page'))->render() !!} 
        </div>
    </div>
</div>

@endsection 
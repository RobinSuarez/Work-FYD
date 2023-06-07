<div class="card shadow mb-4">
    <div class="card-header {{ $ch ?? '' }} ">
        {{ $title ?? 'DETAIL HEADER TITLE' }}

        @if (($is_edit ?? 0) == 1 && ($status_id ?? 0) == 1)
        <a href="{{ route($route.".create", [$header_var => $header_pk]) }}" class="btn btn-secondary btn-sm border border-light float-end">
            <i class="fa-regular fa-plus"></i> New Record
        </a>
    @endif
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead class="table-light-blue">
                <tr>
                    <td>NO.</td>
                    @if(($enable_id ?? 0) == 1)
                        <td>ID</td>
                    @endif
                        @forelse ($columns as $column)
                            <td>{{$column['label']}}</td>
                        @empty
                        @endforelse
                    @if (($is_edit ?? 0) == 1 && ($status_id ?? 0) == 1)
                        <td>ACTIONS</td>
                    @endif
                </tr>
            </thead>

            <tbody>
                @forelse ($details as $detail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if(($enable_id ?? 0) == 1)
                            <td><a href="{{ route("$route.show", [$detail_var => $detail->id]) }}">{{ sprintf('%08d', $detail->id) }}</a></td>
                        @endif
                        @forelse ($columns as $column)
                            @if (($column['cb'] ?? 0) == 1)
                            <td><input class="form-check-input" type="checkbox" value="1" {{ ($detail[$column['name']]??0) == 1 ? "checked":""}} disabled></td>
                            @else
                            <td>{{ $detail[$column['name']]}}</td>
                            @endif
                        @empty
                        @endforelse
                        @if (($is_edit ?? 0) == 1 && ($status_id ?? 0) == 1)
                        <td>
                            <div class="form d-inline">
                                <a href="{{ route("$route.show", [$detail_var => $detail->id]) }}" class="btn btn-sm btn-secondary btn-sm mb-1 action-btn">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                            <div class="form d-inline">
                                <a href="{{ route("$route.edit", [$detail_var => $detail->id]) }}" class="btn btn-sm btn-secondary btn-sm mb-1 action-btn">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <form method="POST" class="form d-inline "
                                action="{{ route($route.".destroy", [$detail_var => $detail->id]) }} " class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="Delete!" class="btn btn-sm btn-danger btn-sm mb-1 action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')">
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

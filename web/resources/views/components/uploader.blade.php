@if (($disabled ?? null) === null)
<div class="{{ $col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3' }}">
    <label for={{ $name }} class="form-label {{ $label_class ?? '' }}">{{ $label ?? strtoupper(str_replace('_', ' ', $name)) }}</label>
    <div class="input-group ">
        <input type="file" class="form-control {{ $name }}" id="{{ $name }}" name="{{ $name }}" aria-label="{{ $name }}" >
        @if(isset($value) && isset($path))
        {{-- <button class="btn btn-success" type="button" id="{{ $name }}_dowload" onclick="window.open('{{ asset('storage/'.$path.'/'.$value) }}')"><i class="fas fa-download"></i></button> --}}
        <a href="{{ asset('storage/'.$path.'/'.$value) }}" class="btn btn-success" id="{{ $name }}_dowload" target="_blank" download><i class="fas fa-download"></i></a>
        <small class="w-100 text-secondary">{{ $value }}</small>
        @endif
    </div>
</div>    

@else
<div class="{{ $col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3' }}">
    <label for={{ $name }} class="form-label {{ $label_class ?? '' }}">{{ $label ?? strtoupper(str_replace('_', ' ', $name)) }}</label>
    <div class="input-group ">
        <input type="file" class="form-control {{ $name }}" id="{{ $name }}" name="{{ $name }}" aria-label="{{ $name }}" disabled>
        @if(isset($value) && isset($path))
        {{-- <button class="btn btn-success" type="button" id="{{ $name }}_dowload" onclick="window.open('{{ asset('storage/'.$path.'/'.$value) }}')"><i class="fas fa-download"></i></button> --}}
        <a href="{{ asset('storage/'.$path.'/'.$value) }}" class="btn btn-success" id="{{ $name }}_dowload" target="_blank" download><i class="fas fa-download"></i></a>
        <small class="w-100 text-secondary">{{ $value }}</small>
        @endif
    </div>
</div>      
@endif
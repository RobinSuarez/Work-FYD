@if (($disabled ?? null) === null)
    <div class="{{ $col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3' }}">
        <label for="{{ $name }}" class="form-label d-flex {{ $label_class ?? '' }}">{{ $label ?? strtoupper(str_replace('_', ' ', $name)) }}</label>
        <input type="date" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value ?? old($name) }}">
    </div>
@else
    <div class="{{ $col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3' }}">
        <label for="{{ $name }}" class="form-label d-flex {{ $label_class ?? '' }}" >{{ $label ?? strtoupper(str_replace('_', ' ', $name)) }}</label>
        <input type="date" class="form-control" style="background-color: #e9ecef;" id="{{ $name }}" name="{{ $name }}" value="{{ $value ?? old($name) }}" readonly>
    </div>
@endif
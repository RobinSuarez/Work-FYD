@if (($disabled ?? null) === null)
    <div class="{{ $col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3' }}">
        <label for="{{ $name }}" class="form-label {{ $label_class ?? '' }}">{{ $label ?? strtoupper(str_replace('_', ' ', $name)) }}</label>
        <input type="email" name="{{ $name }}" id="{{ $name }}" class="form-control {{ $name }}" value="{{ $value ?? old($name) }}" placeholder="{{ $placeholder ?? null }}">
    </div>
@else
    <div class="{{ $col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3' }}">
        <label for="{{ $name }}" class="form-label {{ $label_class ?? '' }}">{{ $label ?? strtoupper(str_replace('_', ' ', $name)) }}</label>
        <input type="email" name="{{ $name }}" id="{{ $name }}" style="background-color: #e9ecef;" class="form-control {{ $name }}" value="{{ $value ?? old($name) }}" placeholder="{{ $placeholder ?? null }}" readonly>
    </div>
@endif
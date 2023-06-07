<div class="{{ $col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3' }}">
    <label for="{{ $name }}" class="form-label {{ $label_class ?? '' }}">{{ $label ?? strtoupper(str_replace('_', ' ', $name)) }}</label>
    <input type="text" id="{{ $name }}" class="form-control {{ $name }}" style="{{ (($disabled ?? null) === null) ? '' : 'background-color: #e9ecef;'}}" name="{{$name}}" value="{{ $value ?? old($name) }}" placeholder="{{ $placeholder ?? null }}" {{ (($disabled ?? null) === null) ? '' : 'disabled'}}>

    @if (($disabled ?? null) != null)
            <input type="hidden" name="{{ $name }}" value="{{ $value ?? old($name) }}"/>
    @endif
</div>


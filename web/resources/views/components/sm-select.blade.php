@if (($disabled ?? null) === null)
<div class="{{ $col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3' }}">
    <div class="input-group input-group-sm">
        <label for="{{ $name }}" class="input-group-text {{ $label_class ?? '' }}" id="{{ $name }}_label">{{ $label ?? strtoupper(str_replace('_', ' ', str_replace('_id', '',$name))) }}</label>
        <select class="form-select {{ $name }}"  name="{{ $name }}" id="{{ $name }}">
            <option value="{{ null }}">{{ 'Select the ' . strtoupper(str_replace('_', ' ', str_replace('_id', '', $label ?? $name)))  }}</option>
        @foreach ($elements as $element)
            <option value="{{ $element->id }}" {{ (($value ?? old($name)) == $element->id ? "selected":"") }}>{{ $element->name }}</option>
        @endforeach
        </select>
    </div>
</div>
@else
<div class="{{ $col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3' }}">
    <div class="input-group input-group-sm">
        <label for="{{ $name }}" class="input-group-text {{ $label_class ?? '' }}" id="{{ $name }}_label">{{ $label ?? strtoupper(str_replace('_', ' ', str_replace('_id', '',$name))) }}</label>
        <select class="form-select {{ $name }}"  name="{{ $name }}" id="{{ $name }}" disabled>
            <option value="{{ null }}">{{ 'Select the ' . strtoupper(str_replace('_', ' ', str_replace('_id', '', $label ?? $name)))  }}</option>
        @foreach ($elements as $element)
            <option value="{{ $element->id }}" {{ (($value ?? old($name)) == $element->id ? "selected":"") }}>{{ $element->name }}</option>
        @endforeach
        </select>

        <input type="hidden" id="{{ $name }}" name="{{ $name }}" value={{ $value }}>
    </div>
</div>
@endif

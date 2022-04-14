<div class="mb-3 row {{ $inputClass }}">
    <label for="{{ $name }}"
        class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        <input type="{{ $name }}" class="form-control" id="{{ $name }}"
            {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }}>
    </div>
</div>

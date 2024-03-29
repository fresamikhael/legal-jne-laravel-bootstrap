<div class="mb-3 row {{ $inputClass }}" id="{{ $name . 1 }}"
    style="{{ $hidden ? 'display: none !important;' : '' }}">
    @if ($label)
        <label for="{{ $name }}"
            class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    @endif
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        <textarea class="form-control h-100 mt-0" placeholder="{{ $placeholder }}" id="{{ $name }}" style="height: 100px"
            {{ $readOnly ? 'readonly' : '' }} {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }} name="{{ $name }}">{{ $slot }}</textarea>
    </div>
</div>

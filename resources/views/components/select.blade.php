<div class="mb-3 row {{ $inputClass }} {{ $hidden ? 'd-none' : '' }}" id="{{ $name . 1 }}">
    @if ($label)
        <label for="{{ $name }}"
            class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    @endif
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        <select name="{{ $name }}" id="{{ $name }}" class="form-select"
            aria-label="Default select example" {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}>
            <option value="" class="d-none">-- Pilih --</option>
            {{ $slot }}
        </select>
    </div>
</div>

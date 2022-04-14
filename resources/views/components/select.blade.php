<div class="mb-3 row {{ $inputClass }}">
    <label for="{{ $name }}"
        class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        <select name="{{ $name }}" class="form-select" aria-label="Default select example">
            <option value="{{ $value }}">{{ $option }}</option>
        </select>
    </div>
</div>

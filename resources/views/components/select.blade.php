<div class="mb-3 row {{ $inputClass }}">
    @if ($label)
        <label for="{{ $name }}"
        class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>        
    @endif
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        <select name="{{ $name }}" class="form-select" aria-label="Default select example">
            <option class="d-none">-- Pilih --</option>
            {{ $slot }}
        </select>
    </div>
</div>

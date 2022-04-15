<div class="mb-3 row {{ $inputClass }}">
    @if ($label)
        <label for="{{ $name }}"
            class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    @endif
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        <textarea class="form-control" placeholder="{{ $placeholder }}" id="floatingTextarea2" style="height: 100px"
            name="{{ $name }}"></textarea>
    </div>
</div>

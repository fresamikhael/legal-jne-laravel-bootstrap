<div class="mb-3 row {{ $inputClass }}" id="{{ $name . 1 }}" style="{{ $hidden ? "display: none !important;" : "" }}">
    <label for="{{ $name }}"
        class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        @if ($prefix)
            <div class="input-group">
                <span class="input-group-text">{{ $prefix }}</span>
                <input type="{{ $type ? $type : "text" }}" class="form-control" id="{{ $name }}" 
                    placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }}>
            </div>
        @else
            <input type="{{ $type ? $type : "text" }}" class="form-control" id="{{ $name }}"
                placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }}>
        @endif
    </div>
</div>
<div class="mb-3 row {{ $inputClass }}" id="{{ $name . 1 }}"
    style="{{ $hidden ? 'display: none !important;' : '' }}">
    <label for="{{ $name }}"
        class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        @if ($prefix)
            <div class="input-group">
                <span class="input-group-text">{{ $prefix }}</span>
<<<<<<< HEAD
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $id }}"
                    name={{ $name }} placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}>
            </div>
        @else
            <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                name={{ $name }} placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
=======
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                    placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}>
            </div>
        @elseif ($postfix)
            <div class="input-group">
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                    placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}>
                <span class="input-group-text">{{ $postfix }}</span>
            </div>
        @else
            <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
>>>>>>> a441ae0cb4a22bd7946605a847a69b51e6378993
                {{ $required ? 'required' : '' }}>
        @endif
    </div>
</div>

<div class="mb-3 row {{ $inputClass }}" id="{{ $name . 1 }}"
    style="{{ $hidden ? 'display: none !important;' : '' }}">
    <label for="{{ $name }}"
        class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        @if ($prefix)
            <div class="input-group">
                <span class="input-group-text">{{ $prefix }}</span>
<<<<<<< HEAD
<<<<<<< HEAD
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
                    placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }} value="{{ $value }}">
            </div>
        @elseif ($postfix)
            <div class="input-group">
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
                    placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }} value="{{ $value }}">
                <span class="input-group-text">{{ $postfix }}</span>
            </div>
        @else
            <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
                placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }} value="{{ $value }}">
=======
=======
>>>>>>> 2eaee15c758532a6bbe3e472d4a9e282003b16b2
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                    placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }} name="{{ $name }}"
                    {{ $required ? 'required' : '' }}>
            </div>
        @elseif ($postfix)
            <div class="input-group">
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                    placeholder="{{ $placeholder }}" name="{{ $name }}" {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}>
                <span class="input-group-text">{{ $postfix }}</span>
            </div>
        @else
            <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}>
>>>>>>> 2eaee15c758532a6bbe3e472d4a9e282003b16b2
        @endif
    </div>
</div>

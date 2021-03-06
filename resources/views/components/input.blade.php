<div class="mb-3 row {{ $inputClass }} {{ $hidden ? 'd-none' : '' }}" id="{{ $name . 1 }}">
    @if ($label)
        <label for="{{ $name }}"
            class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    @endif
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        @if ($prefix)
            <div class="input-group">
                <span class="input-group-text">{{ $prefix }}</span>
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                    name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }} value="{{ $value ? $value : '' }}"
                    {{ $readOnly ? 'readonly' : '' }} />
            </div>
        @elseif ($postfix)
            <div class="input-group">
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                    name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }} value="{{ $value ? $value : '' }}"
                    {{ $readOnly ? 'readonly' : '' }} />
                <span class="input-group-text">{{ $postfix }}</span>
            </div>
        @else
            @if ($value)
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                    name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }} value="{{ $value }}"
                    {{ $readOnly ? 'readonly' : '' }} />
            @else
                <input type="{{ $type ? $type : 'text' }}" class="form-control" id="{{ $name }}"
                    name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}
                    {{ $readOnly ? 'readonly' : '' }} />
            @endif
        @endif
    </div>
</div>

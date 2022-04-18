<div class="mb-3 row {{ $inputClass }}">
    <label for="{{ $option ? $name . 1 : $name }}"
        class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        @if ($option)
            <div class="d-flex gap-3">
                <select id="{{ $name . 1 }}" class="form-select" style="width: 100%;" onchange="{{ $name }}(this)">
                    <option class="d-none">-- Pilih --</option>
                    <option value="no">Tidak Ada</option>
                    <option value="yes">Ada</option>
                </select>
                <input type="file" class="form-control w-100" style="display: none;" name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }}>
            </div>
        @else
            <input type="file" class="form-control" name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }}>
        @endif
    </div>
</div>

@php
    $script = '
        <script>
            function '. $name .'(that) {
                if (that.value == "yes") {
                    document.getElementById("'. $name . 1 .'").style.width = "50%";
                    document.getElementById("'. $name .'").style.display = "block";
                    document.getElementById("'. $name .'").required = true;
                } else {
                    document.getElementById("'. $name . 1 .'").style.width = "100%";
                    document.getElementById("'. $name .'").style.display = "none";
                    document.getElementById("'. $name .'").required = false;
                }
            }
        </script>';
    echo($script);
@endphp
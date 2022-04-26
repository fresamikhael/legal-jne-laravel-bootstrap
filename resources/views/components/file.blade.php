<div class="mb-3 row {{ $inputClass }} {{ $hidden ? 'd-none' : '' }}">
    @if ($label)
        <label for="{{ $name }}"
            class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
    @endif
    <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
        @if ($option)
            <div class="d-flex gap-3">
                <select id="{{ $name . 1 }}" class="form-select">
                    <option value="" class="d-none">-- Pilih --</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                    <option value="Ada">Ada</option>
                </select>
                <input type="file" class="form-control" name="{{ $name }}" id="{{ $name }}"
                    style="display: none; width: 100%;" multiple="{{ $multiple ? 'multiple' : '' }}" />
            </div>
        @elseif($type == "download")
            <a href="{{ $path }}" target="{{ $blank ? "_blank" : "" }}" class="btn btn-primary w-100">{{ $slot }}</a>
        @else
            <input type="file" class="form-control" name="{{ $name }}" id="{{ $name }}"
                required="{{ $required ? 'required' : '' }}" multiple="{{ $multiple ? 'multiple' : '' }}" />
        @endif
    </div>
</div>


<script>
    document.getElementById("{{$name . 1}}").addEventListener("change", handleChange);

    function handleChange() {
        var x = document.getElementById("{{$name . 1}}");
        console.log('====================================');
        console.log(x.value);
        console.log('====================================');
        if (x.value === "Ada" ) {
            document.getElementById("{{$name}}").style.display = "flex";
            document.getElementById("{{$name}}").required = true;
            document.getElementById("{{$name . 1}}").style.flex = "1";
            document.getElementById("{{$name}}").style.flex = "4";
        } else {
            document.getElementById("{{$name}}").style.display = "none";
            document.getElementById("{{$name}}").required = false;
            document.getElementById("{{$name . 1}}").style.flex = "4";
            document.getElementById("{{$name}}").style.flex = "1";
        }
    }
</script>
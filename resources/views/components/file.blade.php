<div class="mb-3 row {{ $inputClass }}" id="form-input-{{ $name }}"></div>

<script type="text/babel">
    function Option() {
        const [type, setType] = React.useState();

        return (
            <React.Fragment>
                <label for="{{ $option ? $name . 1 : $name }}"
                    class="{{ $labelClass ? $labelClass : 'col-sm-3' }} col-form-label">{{ $label }}</label>
                <div class="{{ $fieldClass ? $fieldClass : 'col-sm-9' }}">
                    @if ($option)
                        <div class="d-flex gap-3">
                            <select id="{{ $name . 1 }}" class="form-select" onChange={ (e)=> setType(e.target.value) }>
                                <option class="d-none">-- Pilih --</option>
                                <option value="no">Tidak Ada</option>
                                <option value="yes">Ada</option>
                            </select>
                            { type === 'yes' ? (
                            <input type="file" class="form-control w-100" name="{{ $name }}" id="{{ $name }}"
                                required="{{ $required ? 'required' : '' }}" multiple="{{ $multiple ? 'multiple' : '' }}" />
                            ) : '' }
                        </div>
                    @elseif($type == "download")
                        <a href="{{ $path }}" target="{{ $blank ? "_blank" : "" }}" class="btn btn-primary w-100">{{ $slot }}</a>
                    @else
                        <input type="file" class="form-control" name="{{ $name }}" id="{{ $name }}"
                            required="{{ $required ? 'required' : '' }}" multiple="{{ $multiple ? 'multiple' : '' }}" />
                    @endif
                </div>
            </React.Fragment>
        )
    }
    ReactDOM.render(<Option />,document.getElementById('form-input-{{ $name }}'))
</script>

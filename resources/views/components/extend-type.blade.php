<div id="extend-type"></div>

<script type="text/babel">
    function ExtendType() {
        const [type, setType] = React.useState();

        return (
            <React.Fragment>
                <div class="mb-3 row">
                    <label for="permit_type" class="col-sm-2 col-form-label">Tipe Perizinan</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="permit_type" id="permit_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="SLF">SLF</option>
                            <option value="Reklame">Reklame</option>
                        </select>
                    </div>
                </div>
                { type === "SLF" ? (
                    {{ $slf }}
                ) : type === "Reklame" ? (
                    {{ $reklame }}
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<ExtendType />,document.getElementById('extend-type'))
</script>

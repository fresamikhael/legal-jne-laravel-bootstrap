<div id="lease-type"></div>

<script type="text/babel">
    function LeaseType() {
        const [type, setType] = React.useState();

        return (
            <React.Fragment>
                <div class="mb-3 row">
                    <label for="landlord_type" class="col-sm-3 col-form-label">Tipe Landlord</label>        
                    <div class="col-sm-9">
                        <select onChange={ (e) => setType(e.target.value) } required name="landlord_type" id="landlord_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="Perorangan">Perorangan</option>
                            <option value="Badan Hukum">Badan Hukum</option>
                        </select>
                    </div>
                </div>
                { type === "Perorangan" ? (
                    {{ $individual }}
                ) : type === "Badan Hukum" ? (
                    {{ $legal_entity }}
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<LeaseType />,document.getElementById('lease-type'))
</script>
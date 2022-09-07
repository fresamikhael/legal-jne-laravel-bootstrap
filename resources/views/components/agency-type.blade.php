<div id="agency-type"></div>

<script type="text/babel">
    function AgencyType() {
        const [type, setType] = React.useState();

        return (
            <React.Fragment>
                <div class="mb-3 row">
                    <label for="agency_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="agency_type" id="agency_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="Cabang Utama">Cabang Utama</option>
                            <option value="Cabang">Cabang</option>
                            <option value="Agen">Agen</option>
                        </select>
                    </div>
                </div>
                { type === "Cabang Utama" ? (
                    {{ $mainbranch }}
                ) : type === "Cabang" ? (
                    {{ $branch }}
                ) : type === "Agen" ? (
                    {{ $agency }}
                )  : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<AgencyType />,document.getElementById('agency-type'))
</script>

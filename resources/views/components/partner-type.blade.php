<div id="partner-type"></div>

<script type="text/babel">
    function PartnerType() {
        const [type, setType] = React.useState();

        return (
            <React.Fragment>
                <div class="mb-3 row">
                    <label for="partner_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="partner_type" id="partner_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="Cabang Utama">Cabang Utama</option>
                            <option value="Cabang">Cabang</option>
                            <option value="Agen">Agen</option>
                        </select>
                    </div>
                </div>
                { type === "Cabang Utama" ? (
                    {{ $cabangutama }}
                ) : type === "Cabang" ? (
                    {{ $cabang }}
                ) : type === "Agen" ? (
                    {{ $agen }}
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<PartnerType />,document.getElementById('partner-type'))
</script>

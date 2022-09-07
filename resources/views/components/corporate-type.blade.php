<div id="corporate-type"></div>

<script type="text/babel">
    function CorporateType() {
        const [type, setType] = React.useState();

        return (
            <React.Fragment>
                <div class="mb-3 row">
                    <label for="corporate_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="corporate_type" id="corporate_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="Anggaran dasar perusahaan">Anggaran dasar perusahaan</option>
                            <option value="SK Menteri Hukum dan Ham">SK Menteri Hukum dan Ham</option>
                            <option value="Identitas Direksi">Identitas Direksi</option>
                            <option value="Identitas Dewan Komisaris">Identitas Dewan Komisaris</option>
                            <option value="Identitas Pemegang Saham">Identitas Pemegang Saham</option>
                            <option value="NPWP">NPWP</option>
                            <option value="NIB">NIB</option>
                            <option value="SIPP">SIPP</option>
                        </select>
                    </div>
                </div>
                { type === "Anggaran dasar perusahaan" ? (
                    {{ $budget }}
                ) : type === "SK Menteri Hukum dan Ham" ? (
                    {{ $minister }}
                ) : type === "Identitas Direksi" ? (
                    {{ $director }}
                ) : type === "Identitas Dewan Komisaris" ? (
                    {{ $commissioner }}
                ) : type === "Identitas Pemegang Saham" ? (
                    {{ $share }}
                ) : type === "NPWP" ? (
                    {{ $npwp }}
                ) : type === "NIB" ? (
                    {{ $nib }}
                ) : type === "SIPP" ? (
                    {{ $sipp }}
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<CorporateType />,document.getElementById('corporate-type'))
</script>

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
                            <option value="Anggaran dasar perusahaan">Cabang Utama - Anggaran dasar perusahaan</option>
                            <option value="SK Hukum dan Ham">Cabang Utama - SK Hukum dan Ham</option>
                            <option value="Identitas Direksi">Cabang Utama - Identitas Direksi</option>
                            <option value="Identitas Dewan Komisaris">Cabang Utama - Identitas Dewan Komisaris</option>
                            <option value="Identitas Pemegang Saham">Cabang Utama - Identitas Pemegang Saham</option>
                            <option value="NPWP">Cabang Utama - NPWP</option>
                            <option value="NIB">Cabang Utama - NIB</option>
                            <option value="Anggaran dasar perusahaan1">Cabang - Anggaran dasar perusahaan</option>
                            <option value="SK Hukum dan Ham1">Cabang - SK Hukum dan Ham</option>
                            <option value="Identitas Direksi1">Cabang - Identitas Direksi</option>
                            <option value="Identitas Dewan Komisaris1">Cabang - Identitas Dewan Komisaris</option>
                            <option value="Identitas Pemegang Saham1">Cabang - Identitas Pemegang Saham</option>
                            <option value="NPWP1">Cabang - NPWP</option>
                            <option value="NIB1">Cabang - NIB</option>
                            <option value="Anggaran dasar perusahaan2">Agen - Anggaran dasar perusahaan</option>
                            <option value="SK Hukum dan Ham2">Agen - SK Hukum dan Ham</option>
                            <option value="Identitas Direksi2">Agen - Identitas Direksi</option>
                            <option value="Identitas Dewan Komisaris2">Agen - Identitas Dewan Komisaris</option>
                            <option value="Identitas Pemegang Saham2">Agen - Identitas Pemegang Saham</option>
                            <option value="NPWP2">Agen - NPWP</option>
                            <option value="NIB2">Agen - NIB</option>
                        </select>
                    </div>
                </div>
                { type === "Anggaran dasar perusahaan" ? (
                    {{ $budget }}
                ) : type === "SK Hukum dan Ham" ? (
                    {{ $ham }}
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
                ) : type === "Anggaran dasar perusahaan1" ? (
                    {{ $budget1 }}
                ) : type === "SK Hukum dan Ham1" ? (
                    {{ $ham1 }}
                ) : type === "Identitas Direksi1" ? (
                    {{ $director1 }}
                ) : type === "Identitas Dewan Komisaris1" ? (
                    {{ $commissioner1 }}
                ) : type === "Identitas Pemegang Saham1" ? (
                    {{ $share1 }}
                ) : type === "NPWP1" ? (
                    {{ $npwp1 }}
                ) : type === "NIB1" ? (
                    {{ $nib1 }}
                ) : type === "Anggaran dasar perusahaan2" ? (
                    {{ $budget2 }}
                ) : type === "SK Hukum dan Ham2" ? (
                    {{ $ham2 }}
                ) : type === "Identitas Direksi2" ? (
                    {{ $director2 }}
                ) : type === "Identitas Dewan Komisaris2" ? (
                    {{ $commissioner1 }}
                ) : type === "Identitas Pemegang Saham2" ? (
                    {{ $share2 }}
                ) : type === "NPWP2" ? (
                    {{ $npwp2 }}
                ) : type === "NIB2" ? (
                    {{ $nib2 }}
                )  : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<PartnerType />,document.getElementById('partner-type'))
</script>

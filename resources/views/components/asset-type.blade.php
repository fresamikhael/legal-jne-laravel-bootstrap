<div id="asset-type"></div>

<script type="text/babel">
    function AssetType() {
        const [type, setType] = React.useState();

        return (
            <React.Fragment>
                <div class="mb-3 row">
                    <label for="asset_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="asset_type" id="asset_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="Sertipikat HGB">Setipikat HGB</option>
                            <option value="Sertipikat HM">Setipikat HM</option>
                            <option value="PBB">PBB</option>
                            <option value="IMB">IMB</option>
                            <option value="SLF">SLF</option>
                            <option value="Akta Jual Beli">Akta Jual Beli</option>
                            <option value="PPJB">PPJB</option>
                            <option value="APH">APH</option>
                            <option value="Kendaraan">Kendaraan</option>
                            <option value="Hak Kekayaan Intelektual1">Hak Kekayaan Intelektual Hak Merek</option>
                            <option value="Hak Kekayaan Intelektual2">Hak Kekayaan Intelektual Hak Cipta</option>
                            <option value="Hak Kekayaan Intelektual3">Hak Kekayaan Intelektual Desain Industri</option>
                        </select>
                    </div>
                </div>
                { type === "Sertipikat HGB" ? (
                    {{ $sertipikathgb }}
                ) : type === "Sertipikat HM" ? (
                    {{ $sertipikathm }}
                ) : type === "PBB" ? (
                    {{ $pbb }}
                ) : type === "IMB" ? (
                    {{ $imb }}
                ) : type === "SLF" ? (
                    {{ $slf }}
                ) : type === "Akta Jual Beli" ? (
                    {{ $akta }}
                ) : type === "PPJB" ? (
                    {{ $ppjb }}
                ) : type === "APH" ? (
                    {{ $aph }}
                ) : type === "Kendaraan" ? (
                    {{ $vehicle }}
                ) : type === "Hak Kekayaan Intelektual1" ? (
                    {{ $hkihm }}
                ) : type === "Hak Kekayaan Intelektual2" ? (
                    {{ $hkihc }}
                ) : type === "Hak Kekayaan Intelektual3" ? (
                    {{ $hkidi }}
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<AssetType />,document.getElementById('asset-type'))
</script>

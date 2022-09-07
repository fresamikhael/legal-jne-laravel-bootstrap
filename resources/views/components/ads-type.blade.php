<div id="ads-type"></div>

<script type="text/babel">
    function AdsType() {
        const [type, setType] = React.useState();

        return (
            <React.Fragment>
                <div class="mb-3 row">
                    <label for="ads_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="ads_type" id="ads_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="SKPD">SKPD</option>
                            <option value="TLBBR">TLBBR</option>
                            <option value="IPR">IPR</option>
                            <option value="IMBBR">IMBBR</option>
                        </select>
                    </div>
                </div>
                { type === "SKPD" ? (
                    {{ $skpd }}
                ) : type === "TLBBR" ? (
                    {{ $tlbbr }}
                ) : type === "IPR" ? (
                    {{ $ipr }}
                ) : type === "IMBBR" ? (
                    {{ $imbbr }}
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<AdsType />,document.getElementById('ads-type'))
</script>

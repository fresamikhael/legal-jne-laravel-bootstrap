<div id="jenis-vendor"></div>

<script type="text/babel"> 
    function JenisVendor() { 
        const [type, setType] = React.useState();
        return (
            <React.Fragment>
                <div class="mb-3 row">
                    <label for="ads_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="agreement_type" id="agreement_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option {{$value == 'Kontraktor Building' ? 'selected' : ''}} value="Kontraktor Building">Kontraktor Building</option>
                            <option {{$value == 'Jasa Perizinan' ? 'selected' : ''}} value="Jasa Perizinan">Jasa Perizinan</option>
                            <option {{$value == 'Kendaraan' ? 'selected' : ''}} value="Kendaraan">Kendaraan</option>
                            <option {{$value == 'Perawatan' ? 'selected' : ''}} value="Perawatan">Perawatan</option>
                            <option {{$value == 'Others' ? 'selected' : ''}} value="Others">Others</option>
                            @if ($valueNew != '')
                                <option selected value="{{$valueNew}}">{{$valueNew}}</option>
                            @endif
                        </select>
                    </div>
                </div>
                {
                    type === "Others" ? (
                        <x-input label="  " name="agreement_type" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                    ) : ""
                }
            </React.Fragment>
        )
    }
    ReactDOM.render(<JenisVendor />,document.getElementById('jenis-vendor'))
</script>

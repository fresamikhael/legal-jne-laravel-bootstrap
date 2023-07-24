@extends ('layouts.legal')

@section('title')
    Add Database Khusus
@endsection

@section('content')
    <x-base>
        <div class="row">
            <div class="col-sm-12">
                <div class="col px-3 py-3" style="background-color: rgb(239, 236, 236); border-radius: 10px;">
                    <nav style="--bs-breadcrumb-divider: '>'; margin-top: -5px; margin-bottom: -18px" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.regulation.index') }}"
                                    style="color:#fe1717">Database</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.regulation.add') }}"
                                    style="color:#fe1717">Khusus</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <form action="{{ route('legal.regulation.normative-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-4">
                <div class="col-sm-12">
                    <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                    <x-input value="Litigasi" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                    <x-input value="Customer Dispute" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                    <x-input value="Customer Dispute" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                    <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tentang</label>
                        <div class="col-sm-10">
                            <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2"></textarea>
                        </div>
                    </div>
                </div>
                <br />
                <br />
                <div class="col-sm-6" style="margin-left: -25px">
                    <div class="mb-3 row">
                        <label for="date" class="col-sm-5 col-form-label">Tanggal Pengiriman</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control dates cannot_texting" id="date"
                                    name="litigation[shipping_date]" />
                                <div class="input-group-text"><span class="fa fa-th"></span></div>
                            </div>
                        </div>
                    </div>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengirim"
                        name="litigation[sender_name]" />
                    <x-address label="Pengirim" name="sender" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Pengirim"
                        name="litigation[sender_phone_number]" />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Kasus" name="litigation[case_type]">
                        <option value="Terlambat">Terlambat</option>
                        <option value="Hilang">Hilang</option>
                        <option value="Rusak">Rusak</option>
                    </x-select>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab"
                        name="litigation[causative_factor]">
                        <option value="Alamat Tidak Jelas">Alamat Tidak Jelas</option>
                        <option value="Penerima Tidak Tepat">Penerima Tidak Tepat</option>
                        <option value="Kendala Pihak Ketiga">Kendala Pihak Ketiga</option>
                        <option value="Pencurian">Pencurian</option>
                        <option value="Kecelakaan">Kecelakaan</option>
                        <option value="Force Majeur">Force Majeur</option>
                        <option value="Lain-Lain">Lain-Lain</option>
                    </x-select>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab (Lain-Lain)"
                        name="litigation[causative_factor_others]" hidden />

                    <script>
                        document.getElementById("litigation[causative_factor]").addEventListener("change", handleChange);

                        function handleChange() {
                            var x = document.getElementById("litigation[causative_factor]");
                            if (x.value === "Lain-Lain") {
                                document.getElementById("litigation[causative_factor_others]1").style.display = "flex";
                            } else {
                                document.getElementById("litigation[causative_factor_others]1").style.display = "none";
                            }
                        }
                    </script>
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima"
                        name="litigation[receiver_name]" />
                    <x-address label="Penerima" name="receiver" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Penerima"
                        name="litigation[receiver_phone_number]" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp"
                        type="tel" name="litigation[total_loss]" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Barang" prefix="Rp"
                        type="tel" name="litigation[item_nominal]" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Connote/Perjanjian"
                        name="litigation[connote]" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Customer" name="litigation[customer]" />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Pengiriman"
                        name="litigation[shipping_type]">
                        <option value="Hight Value Service">Hight Value Service</option>
                        <option value="Non HVS">Non HVS</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Dangerous Goods">Dangerous Goods</option>
                    </x-select>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi" name="litigation[assurance]">
                        <option value="Ada">Ada</option>
                        <option value="Tidak">Tidak</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi Nominal" type="tel"
                        name="litigation[assurance_nominal]" prefix="Rp" hidden />
                    <script>
                        document.getElementById("litigation[assurance]").addEventListener("change", handleChange);

                        function handleChange() {
                            var x = document.getElementById("litigation[assurance]");
                            if (x.value === "Ada") {
                                document.getElementById("litigation[assurance_nominal]1").classList.remove('d-none');
                                document.getElementById("litigation[assurance_nominal]1").classList.add('d-flex');
                            } else {
                                document.getElementById("litigation[assurance_nominal]1").classList.remove('d-flex');
                                document.getElementById("litigation[assurance_nominal]1").classList.add('d-none');
                            }
                        }
                    </script>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea label="Kronologis Singkat Kejadian:" name="litigation[incident_chronology]" />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Bentuk Kiriman :</h5>
                </div>
                <div class="col-sm-9">
                    <x-select fieldClass="col-sm-12" name="litigation[shipping_form]">
                        <option value="Dokumen">Dokumen</option>
                        <option value="KTP">KTP</option>
                        <option value="Paspor">Paspor</option>
                        <option value="STNK/BPKB">STNK/BPKB</option>
                        <option value="Pakaian">Pakaian</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Tumbuhan">Tumbuhan</option>
                        <option value="Aksesoris">Aksesoris</option>
                        <option value="Lain-Lain">Lain-Lain</option>
                    </x-select>
                    <x-textarea fieldClass="col-sm-12" name="litigation[detail_shipping_form]" hidden />
                    <script>
                        document.getElementById("litigation[shipping_form]").addEventListener("change", handleChange);

                        function handleChange() {
                            var x = document.getElementById("litigation[shipping_form]");
                            if (x.value === "Lain-Lain") {
                                document.getElementById("litigation[detail_shipping_form]1").style.display = "flex";
                            } else {
                                document.getElementById("litigation[detail_shipping_form]1").style.display = "none";
                            }
                        }
                    </script>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Bukti :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Connote" name="file[connote]" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Orion" name="file[orion]" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD" name="file[pod]" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Form Kasus Sengketa Konsumen"
                        name="file[kasus_sengketa_konsumen]" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi"
                        name="file[kronologi_destinasi]" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin"
                        name="file[kronologi_origin]" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS"
                        name="file[kronologi_cs]" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi"
                        name="file[customer_somasi]" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" name="file[kuasa]" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Dokumen Lainnya" name="file[other][]"
                        multiple />
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-primary" />
            </div>
        </form>
    </x-base>
@endsection

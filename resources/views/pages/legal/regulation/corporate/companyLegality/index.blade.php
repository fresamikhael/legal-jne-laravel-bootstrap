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

        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.regulation.normative-post') }}">
            @csrf
            <div class="row mt-4">
                <x-corporate-type>
                    @slot('budget')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="Anggaran dasar perusahaan" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Judul Akta" name="title_deed" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Notaris" name="notary_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <div class="d-flex flex-row mb-3">
                                    <label class="col-sm-2 mt-1" for="">Nama Direksi</label>
                                    <input name="director_name" class="form-control mx-1" placeholder="Masukkan Nama Direksi" />
                                    <input name="director_name1" class="form-control mx-1"placeholder="Masukkan Nama Direksi" />
                                    <input name="director_name2" class="form-control mx-1"
                                        placeholder="Masukkan Nama Direksi" />
                                    <input name="director_name3" class="form-control mx-1"placeholder="Masukkan Nama Direksi" />
                                </div>
                                {{-- <x-input label="Nama Direksi" name="director_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required /> --}}
                                <div class="d-flex flex-row mb-3">
                                    <label class="col-sm-2 mt-1" for="">Masa Jabatan Direksi Susunan Pemegang Saham dan
                                        jumlah saham</label>
                                    <input name="comms_term_arr" class="form-control mx-1"
                                        placeholder="Masukkan Masa Jabatan" />
                                    <input name="comms_term_arr1"
                                        class="form-control mx-1"placeholder="Masukkan Masa Jabatan" />
                                    <input name="comms_term_arr2" class="form-control mx-1"
                                        placeholder="Masukkan Masa Jabatan" />
                                    <input name="comms_term_arr3"
                                        class="form-control mx-1"placeholder="Masukkan Masa Jabatan" />
                                </div>
                                <div class="d-flex flex-row mb-3">
                                    <label class="col-sm-2 mt-1" for=""></label>
                                    <input name="comms_term_arr_share" class="form-control mx-1"
                                        placeholder="Masukkan jumlah saham" />
                                    <input name="comms_term_arr_share1"
                                        class="form-control mx-1"placeholder="Masukkan jumlah saham" />
                                    <input name="comms_term_arr_share2" class="form-control mx-1"
                                        placeholder="Masukkan jumlah saham" />
                                    <input name="comms_term_arr_share3"
                                        class="form-control mx-1"placeholder="Masukkan jumlah saham" />
                                </div>
                                {{-- <x-input label="Masa Jabatan Direksi Susunan Pemegang Saham dan jumlah saham"
                                    name="comms_term_arr" labelClass="col-sm-2" fieldClass="col-sm-10" required /> --}}
                                <div class="d-flex flex-row mb-3">
                                    <label class="col-sm-2 mt-1" for="">Nama Dewan Komisaris Susunan Pemegang Saham dan
                                        Jumlah Saham</label>
                                    <input name="comms_name" class="form-control mx-1" placeholder="Masukkan Nama Dewan" />
                                    <input name="comms_name1" class="form-control mx-1"placeholder="Masukkan Nama Dewan" />
                                    <input name="comms_name2" class="form-control mx-1" placeholder="Masukkan Nama Dewan" />
                                    <input name="comms_name3" class="form-control mx-1"placeholder="Masukkan Nama Dewan" />
                                </div>
                                <div class="d-flex flex-row mb-3">
                                    <label class="col-sm-2 mt-1" for=""></label>
                                    <input name="comms_name_share" class="form-control mx-1"
                                        placeholder="Masukkan jumlah saham" />
                                    <input name="comms_name_share1"
                                        class="form-control mx-1"placeholder="Masukkan jumlah saham" />
                                    <input name="comms_name_share2" class="form-control mx-1"
                                        placeholder="Masukkan jumlah saham" />
                                    <input name="comms_name_share3"
                                        class="form-control mx-1"placeholder="Masukkan jumlah saham" />
                                </div>
                                {{-- <x-input label="Nama Dewan Komisaris Susunan Pemegang Saham dan Jumlah Saham"
                                    name="comms_name" labelClass="col-sm-2" fieldClass="col-sm-10" required /> --}}
                                <div class="d-flex flex-row mb-3">
                                    <label class="col-sm-2 mt-1" for="">Masa Jabatan Komisaris Susunan Pemegang Saham
                                        dan jumlah saham</label>
                                    <input name="comms_term" class="form-control mx-1"
                                        placeholder="Masukkan Masa Jabatan Komisaris" />
                                    <input name="comms_term1"
                                        class="form-control mx-1"placeholder="Masukkan Masa Jabatan Komisaris" />
                                    <input name="comms_term2" class="form-control mx-1"
                                        placeholder="Masukkan Masa Jabatan Komisaris" />
                                    <input name="comms_term3"
                                        class="form-control mx-1"placeholder="Masukkan Masa Jabatan Komisaris" />
                                </div>
                                <div class="d-flex flex-row mb-3">
                                    <label class="col-sm-2 mt-1" for=""></label>
                                    <input name="comms_term_share" class="form-control mx-1"
                                        placeholder="Masukkan jumlah saham" />
                                    <input name="comms_term_share1"
                                        class="form-control mx-1"placeholder="Masukkan jumlah saham" />
                                    <input name="comms_term_share2" class="form-control mx-1"
                                        placeholder="Masukkan jumlah saham" />
                                    <input name="comms_term_share3"
                                        class="form-control mx-1"placeholder="Masukkan jumlah saham" />
                                </div>
                                {{-- <x-input label="Masa Jabatan Komisaris Susunan Pemegang Saham dan jumlah saham"
                                    name="comms_term" labelClass="col-sm-2" fieldClass="col-sm-10" required /> --}}
                                <div class="d-flex flex-row mb-3">
                                    <label class="col-sm-2 mt-1" for="">Susunan Pemegang Saham dan jumlah
                                        saham</label>
                                    <input name="comms_arr" class="form-control mx-1"
                                        placeholder="Masukkan Susunan Pemegang Saham" />
                                    <input name="comms_arr1"
                                        class="form-control mx-1"placeholder="Masukkan Susunan Pemegang Saham" />
                                    <input name="comms_arr2" class="form-control mx-1"
                                        placeholder="Masukkan Susunan Pemegang Saham" />
                                    <input name="comms_arr3"
                                        class="form-control mx-1"placeholder="Masukkan Susunan Pemegang Saham" />
                                </div>
                                <div class="d-flex flex-row mb-3">
                                    <label class="col-sm-2 mt-1" for=""></label>
                                    <input name="comms_arr_share" class="form-control mx-1"
                                        placeholder="Masukkan jumlah saham" />
                                    <input name="comms_arr_share1"
                                        class="form-control mx-1"placeholder="Masukkan jumlah saham" />
                                    <input name="comms_arr_share2" class="form-control mx-1"
                                        placeholder="Masukkan jumlah saham" />
                                    <input name="comms_arr_share3"
                                        class="form-control mx-1"placeholder="Masukkan jumlah saham" />
                                </div>
                                {{-- <x-input label="Susunan Pemegang Saham dan jumlah saham" name="comms_arr"
                                    labelClass="col-sm-2" fieldClass="col-sm-10" required /> --}}
                                <x-input label="Isi Akta" name="body" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('minister')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="SK Menteri Hukum dan Ham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jenis SK" name="sk_type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('director')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Identitas Direksi" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="KTP" name="ktp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="NPWP" name="npwp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="KK" name="kk_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Passport" name="passport_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="Pas Foto" name="file_database" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('commissioner')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Identitas Dewan Komisaris" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="KTP" name="ktp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="NPWP" name="npwp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="KK" name="kk_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Passport" name="passport_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="Pas Foto" name="file_database" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('share')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Identitas Pemegang Saham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="KTP/Anggaran Dasar" name="ktp" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="KTP/Anggaran Dasar" name="ktp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="NPWP" name="npwp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="KK" name="kk_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Passport" name="passport_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="Pas Foto" name="file_database" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('npwp')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="NPWP" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('nib')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="NIB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KBLI" name="kbli" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('sipp')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="SIPP" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot
                </x-corporate-type>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection

@push('addon-script')
    <script>
        document.getElementById("corporate_type").addEventListener("change", handleChange);

        function handleChange() {
            var x = document.getElementById("corporate_type");
            if (x.value === "Anggaran dasar perusahaan") {
                document.getElementById("dynamicTable1").classList.remove('d-none');
                document.getElementById("dynamicTable1").classList.add('d-flex');
                document.getElementById("dynamicTable").required = true;
            } else {
                document.getElementById("dynamicTable1").classList.remove('d-flex');
                document.getElementById("dynamicTable1").classList.add('d-none');
                document.getElementById("dynamicTable").required = false;
            }
        }
    </script>
    <script type="text/javascript">
        $(function() {
            var table = $('#dataTables').DataTable({
                paging: false,
                searching: false,
                retrieve: true,
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: "{{ route('permit.newpermit') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        "className": "text-center"
                    },
                    {
                        data: 'id',
                        name: 'id',
                        "className": "text-center"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        "className": "text-center",
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
        var i = 0;

        $("#add").click(function() {

            ++i;

            $("#dynamicTable").append($("#test").html());
        });

        $("#add1").click(function() {

            ++i;

            $("#dynamicTable1").append($("#test1").html());
        });

        $("#add2").click(function() {

            ++i;

            $("#dynamicTable2").append($("#test2").html());
        });

        $("#add3").click(function() {

            ++i;

            $("#dynamicTable3").append($("#test3").html());
        });

        $("#add4").click(function() {

            ++i;

            $("#dynamicTable4").append($("#test4").html());
        });
        // var form_tags = document.getElementById('form')
        // $(document).on('click', '#remove', function() {
        //     // $(this).parents('tr').remove();
        //     if (form_tags.length > 2) {
        //         form_tags.removeChild();
        //     }
        // });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
    <script type="text/html" id="test">
        <tr>
            <td>
                <div class="d-flex justify-content-start my-2">
                    <div class="col-sm-12">
                        <x-input label="Nama Direksi" name="document_name[]" labelClass="col-sm-3" fieldClass="col-sm-9">
                        </x-input>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-end my-2">
                    <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Hapus</button>
                </div>
            </td>
        </tr>
    </script>
    <script type="text/html" id="test1">
        <tr>
            <td>
                <div class="d-flex justify-content-start my-2">
                    <div class="col-sm-12">
                        <x-input placeholder="Masa Jabatan Komisaris Susunan Pemegang Saham"
                            label="Masa Jabatan Komisaris Susunan Pemegang Saham dan jumlah saham"
                            name="document_name[]" labelClass="col-sm-3" fieldClass="col-sm-9">
                        </x-input>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-end my-2">
                    <div class="col-sm-12">
                        <x-input placeholder="Jumlah Saham" name="document_name[]" labelClass="col-sm-3"
                            fieldClass="col-sm-9">
                        </x-input>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-end my-2">
                    <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Hapus</button>
                </div>
            </td>
        </tr>
    </script>
    <script type="text/html" id="test2">
        <tr>
            <td>
                <div class="d-flex justify-content-start my-2">
                    <div class="col-sm-12">
                        <x-input placeholder="Nama Dewan Komisaris Susunan Pemegang Saham"
                            label="Nama Dewan Komisaris Susunan Pemegang Saham dan Jumlah Saham"
                            name="document_name[]" labelClass="col-sm-3" fieldClass="col-sm-9">
                        </x-input>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-end my-2">
                    <div class="col-sm-12">
                        <x-input placeholder="Jumlah Saham" name="document_name[]" labelClass="col-sm-3"
                            fieldClass="col-sm-9">
                        </x-input>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-end my-2">
                    <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Hapus</button>
                </div>
            </td>
        </tr>
    </script>
    <script type="text/html" id="test3">
        <tr>
            <td>
                <div class="d-flex justify-content-start my-2">
                    <div class="col-sm-12">
                        <x-input label="Masa Jabatan Komisaris Susunan Pemegang Saham dan jumlah saham" name="document_name[]" labelClass="col-sm-3" fieldClass="col-sm-9">
                        </x-input>
                    </div>
                </div>
            </td>
            {{-- <td>
                <div class="d-flex justify-content-center my-2">
                    <div class="col-sm-12">
                        <x-select label="Tipe Dokumen" name="document_type[]" labelClass="col-sm-6" fieldClass="col-sm-6"
                            required>
                            <option value="" style="display: none" selected>-- Pilih --</option>
                            <option value="Hard Copy">Hard Copy</option>
                            <option value="Soft Copy">Sof Copy</option>
                        </x-select>
                    </div>
                </div>
            </td> --}}
            <td>
                <div class="d-flex justify-content-end my-2">
                    <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Hapus</button>
                </div>
            </td>
        </tr>
    </script>
    <script type="text/html" id="test4">
        <tr>
            <td>
                <div class="d-flex justify-content-start my-2">
                    <div class="col-sm-12">
                        <x-input placeholder="Susunan Pemegang Saham"
                            label="Susunan Pemegang Saham dan jumlah saham" name="document_name[]"
                            labelClass="col-sm-3" fieldClass="col-sm-9">
                        </x-input>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-end my-2">
                    <div class="col-sm-12">
                        <x-input placeholder="Jumlah Saham" name="document_name[]" labelClass="col-sm-3"
                            fieldClass="col-sm-9">
                        </x-input>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-end my-2">
                    <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Hapus</button>
                </div>
            </td>
        </tr>
    </script>
@endpush

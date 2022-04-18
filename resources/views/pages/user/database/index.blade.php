@extends('layouts.user')

@section('title')
    Database
@endsection

@section('content')
    <x-base>
        <div class="container">
            <div class="row g-2">
                <div class="col-3 pe-4">
                    <div style="background-color:#D0391C">
                        <div class="col px-4 py-3" style="color: white">
                            <i class="fa-solid fa-align-left"></i>
                            <span>Pencarian</span>
                        </div>
                    </div>
                    <div class="p-3 border bg-white">
                        <div class="mb-3 row">
                            <label class="col-sm-8 col-form-label">Pilih Jenis Peraturan</label>
                            <div class="col-sm-12">
                                <select name="permit_type" class="form-control" aria-label="Default select example">
                                    <option value="">-- Semua Peraturan --</option>
                                    <option value="UU">UU</option>
                                    <option value="PERPU">PERPU</option>
                                    <option value="PP">PP</option>
                                    <option value="PERPRES">PERPRES</option>
                                </select>
                            </div>
                        </div>
                        <x-input label="Nomor Peraturan" labelClass="col-sm-8" fieldClass="col-sm-12"></x-input>
                        <x-input label="Tahun Peraturan" labelClass="col-sm-8" fieldClass="col-sm-12"></x-input>
                        <x-input label="Tentang" labelClass="col-sm-8" fieldClass="col-sm-12"></x-input>

                    </div>
                </div>
                <div class="col-9">
                    <div style="background-color:#D0391C">
                        <div class="col px-4 py-3" style="color: white">
                            <i class="fa-solid fa-align-left"></i>
                            <span>Pencarian</span>
                        </div>
                    </div>
                    <div class="p-3 border bg-white">
                        <div class="border rounded">
                            <table class="table table-borderless">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </x-base>
@endsection

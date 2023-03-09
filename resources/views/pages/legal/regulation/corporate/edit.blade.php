<form class="mt-4" method="POST" enctype="multipart/form-data"
    action="{{ route('legal.regulation.special-update', $database->id) }}">
    @csrf
    @if (
        $database->unit == 'Anggaran dasar perusahaan' ||
            $database->unit == 'SK Menteri Hukum dan Ham' ||
            $database->unit == 'Identitas Direksi' ||
            $database->unit == 'Identitas Dewan Komisaris' ||
            $database->unit == 'Identitas Pemegang Saham' ||
            $database->unit == 'NPWP' ||
            $database->unit == 'NIB' ||
            $database->unit == 'SIPP')
        @include('pages.legal.regulation.corporate.companyLegality.edit')
    @elseif ($database->unit == 'Cabang Utama' || $database->unit == 'Cabang' || $database->unit == 'Agen')
        @include('pages.legal.regulation.corporate.partnerData.edit')
    @endif
    <div class="d-flex justify-content-end me-4">
        <x-button type="submit" name="Upload" buttonClass="btn-primary" />
    </div>
</form>

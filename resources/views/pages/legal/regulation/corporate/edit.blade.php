<form class="mt-4" method="POST" enctype="multipart/form-data"
    action="{{ route('legal.regulation.special-update', $database->id) }}">
    @csrf
    @if ($database->category == 'Legalitas Perusahaan')
        @include('pages.legal.regulation.corporate.companyLegality.edit')
    @elseif ($database->category == 'Data Mitra')
        @include('pages.legal.regulation.corporate.partnerData.edit')
    @elseif ($database->category == 'Aset Perusahaan')
        @include('pages.legal.regulation.corporate.companyAsset.edit')
    @elseif ($database->category == 'SK Dewan Komisaris dan Direksi')
        @include('pages.legal.regulation.corporate.skBoardCommsDirector.edit')
    @elseif ($database->category == 'SK Dewan Komisaris')
        @include('pages.legal.regulation.corporate.skBoardComms.edit')
    @elseif ($database->category == 'Sertifikat Saham')
        @include('pages.legal.regulation.corporate.shareCertificate.edit')
    @elseif ($database->category == 'SK Direksi')
        @include('pages.legal.regulation.corporate.skDirector.edit')
    @elseif ($database->category == 'SE Direksi')
        @include('pages.legal.regulation.corporate.seDirector.edit')
    @elseif ($database->category == 'Internal Memo Direksi')
        @include('pages.legal.regulation.corporate.internalMemoDirector.edit')
    @elseif ($database->category == 'Surat Kuasa')
        @include('pages.legal.regulation.corporate.powerOfAttorney.edit')
    @endif
    <div class="d-flex justify-content-end me-4">
        <x-button type="submit" name="Upload" buttonClass="btn-primary" />
    </div>
</form>

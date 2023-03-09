<form class="mt-4" method="POST" enctype="multipart/form-data"
    action="{{ route('legal.regulation.special-update', $database->id) }}">
    @csrf
    @if ($database->category == 'Legalitas Perusahaan')
        @include('pages.legal.regulation.corporate.companyLegality.edit')
    @elseif ($database->category == 'Data Mitra')
        @include('pages.legal.regulation.corporate.partnerData.edit')
    @endif
    <div class="d-flex justify-content-end me-4">
        <x-button type="submit" name="Upload" buttonClass="btn-primary" />
    </div>
</form>

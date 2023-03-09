<form class="mt-4" method="POST" enctype="multipart/form-data"
    action="{{ route('legal.regulation.special-update', $database->id) }}">
    @csrf
    @if ($database->category == 'Izin Reklame')
        @include('pages.legal.regulation.permit.advertisingPermit.edit')
    @elseif ($database->category == 'Izin Lingkungan')
        @include('pages.legal.regulation.permit.environmentalPermit.edit')
    @elseif ($database->category == 'Izin K3')
        @include('pages.legal.regulation.permit.k3Permit.edit')
    @elseif ($database->category == 'Disnaker')
        @include('pages.legal.regulation.permit.disnaker.edit')
    @endif
    <div class="d-flex justify-content-end me-4">
        <x-button type="submit" name="Upload" buttonClass="btn-primary" />
    </div>
</form>

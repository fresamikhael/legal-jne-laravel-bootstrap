<form class="mt-4" method="POST" enctype="multipart/form-data"
    action="{{ route('legal.regulation.special-update', $database->id) }}">
    @csrf
    @if ($database->category == 'Keagenan')
        @include('pages.legal.regulation.drafting.agency.edit')
    @elseif ($database->category == 'Customer')
        @include('pages.legal.regulation.drafting.customer.edit')
    @elseif ($database->category == 'Sewa Menyewa')
        @include('pages.legal.regulation.drafting.lease.edit')
    @elseif ($database->category == 'Others')
        @include('pages.legal.regulation.drafting.others.edit')
    @elseif ($database->category == 'Supplier/Vendor')
        @include('pages.legal.regulation.drafting.supplierVendor.edit')
    @endif
    <div class="d-flex justify-content-end me-4">
        <x-button type="submit" name="Upload" buttonClass="btn-primary" />
    </div>
</form>

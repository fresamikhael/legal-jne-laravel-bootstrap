<form class="mt-4" method="POST" enctype="multipart/form-data"
    action="{{ route('legal.regulation.special-update', $database->id) }}">
    @csrf
    @if ($database->category == 'Customer Dispute')
        @include('pages.legal.regulation.litigation.customer-dispute.edit')
    @elseif ($database->category == 'Others')
        @include('pages.legal.regulation.litigation.others.edit')
    @endif
    <div class="d-flex justify-content-end me-4">
        <x-button type="submit" name="Upload" buttonClass="btn-primary" />
    </div>
</form>

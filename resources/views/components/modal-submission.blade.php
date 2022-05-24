<!-- Button trigger modal -->
<button type="button" class="btn btn-warning d-flex align-items-center gap-2 position-relative" data-bs-toggle="modal"
    data-bs-target="#staticBackdrop3">
    <i class="fa fa-clock-o"></i> Permintaan
    @if ($data)
        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
            <span class="visually-hidden">New alerts</span>
        </span>
    @endif
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="{{ $id }}" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        {{ $header }}
                    </thead>
                    <tbody>
                        {{ $data }}
                    </tbody>
                    <tfoot>
                        {{ $header }}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

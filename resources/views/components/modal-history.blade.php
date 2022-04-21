<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal"
    data-bs-target="#staticBackdrop2">
    <i class="fa fa-clock-o"></i> Riwayat
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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

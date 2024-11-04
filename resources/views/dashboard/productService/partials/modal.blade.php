{{-- delete modal start --}}
<div class="modal fade" id="serviceModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('SupUser.ProductSerArchive') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product And Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-danger">
                    <div class="form-group">
                        <b class="text-white">Are you sure to Archive this product! <br>Be carefull ! </b>
                        <input type="hidden" class="form-control" name="serviceModalDeleteid" id="serviceModalDeleteid" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Archive</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- delete modal end --}}
{{-- delete modal start --}}
<div class="modal fade" id="archiveProdiuctDeleteMoffff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('SupUser.ProductServiceDelete') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product And Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-danger">
                    <div class="form-group">
                        <b class="text-white">Are you sure to delete this product! <br>Be carefull ! </b>
                        <input type="hidden" class="form-control" name="archiveProdiuctDeleteMoffffID" id="archiveProdiuctDeleteMoffffID" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- delete modal end --}}

<div class="modal fade" id="archiveProdRestoreModffff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('SupUser.ProductServiceRestore') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product And Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <b class="">Are you sure to Restore this product! </b>
                        <input type="hidden" class="form-control" name="archiveProdRestoreModffffID" id="archiveProdRestoreModffffID" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Restore</button>
                </div>
            </form>
        </div>
    </div>
</div>

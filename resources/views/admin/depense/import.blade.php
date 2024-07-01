<form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="modal fade" id="ModalImport" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Importer</h4>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input class="form-control" type="file" name="fichier" id="">
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Import Excel</button>
                </div>
            </div>
        </div>
    </div>
</form>

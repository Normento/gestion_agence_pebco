<form action="{{route('poste.store')}}" method="POST">
    @csrf
    <div class="modal fade" id="ModalAddPoste" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Postes</h4>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class=" control-label">Code du poste </label>
                        <div class="">
                            <input type="text" name="code" class="form-control">
                            @error('code')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Nom du poste </label>
                        <div class="">
                            <input type="text" name="nom" class="form-control">
                            @error('code')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-info">Enrégistrer'</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="{{route('region.update',$region->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="modal fade" id="ModalEdit{{$region->id}}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier</h4>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class=" control-label"> Nom du region </label>
                        <div class="">
                            <input type="text" name="nom_region" value="{{$region->nom_region}}" class="form-control">
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
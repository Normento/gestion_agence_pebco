<form action="{{route('user.destroy',$user->id)}}" method="POST">
    @csrf
    @method('delete')
    <div class="modal fade" id="ModalDeleteUser{{$user->id}}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Supprimer</h4>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> <b>Etes vous sûre de vouloir supprimer {{$user->nom}} {{$user->prenom}} ?</b> </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Confirmer</button>
                </div>
            </div>
        </div>
    </div>
</form>

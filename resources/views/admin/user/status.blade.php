<form action="{{route('statu',$user->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="modal fade" id="ModalStatUser{{$user->id}}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@if ($user->active == 1)
                        Bloquer
                        @else
                        Débloquer
                        @endif</h4>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($user->active == 1)
                <div class="modal-body"> <b>Etes vous sûre de vouloir Bloqué {{$user->nom}} {{$user->prenom}} ?</b> </div>
                <input type="hidden" name="active" value="0">
                @else
                <div class="modal-body"> <b>Etes vous sûre de vouloir Débloqué {{$user->nom}} {{$user->prenom}} ?</b> </div>
                <input type="hidden" name="active" value="1">
                @endif

                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Annuler</button>
                    @if ($user->active == 1)
                    <button type="submit" class="btn btn-danger">Bloquer</button>
                    @else
                    <button type="submit" class="btn btn-success">Débloquer</button>
                    @endif

                </div>
            </div>
        </div>
    </div>
</form>

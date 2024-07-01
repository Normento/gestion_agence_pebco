<form action="{{route('agence.update',$agence->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="modal fade" id="ModalEditAgence{{$agence->id}}" tabindex="1" role="dialog" aria-hidden="true">
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
                        <label class=" control-label">Code de l'agence </label>
                        <div class="">
                            <input type="text" name="code_agence" class="form-control" value="{{$agence->code_agence}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" control-label">Nom de la region </label>
                        <div class="">
                            <input type="text" name="nom_agence" class="form-control" value="{{$agence->nom_agence}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" control-label">Région </label>
                        <div class="">
                            <select class="form-control" name="region_id">
                            <option value="">Veuillez choisir une région</option>
                                @foreach ( $regions as $region)
                                <option value="{{$region->id}}">{{$region->nom_region}}</option>
                                @endforeach

                            </select>
                            @error('region_id')
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

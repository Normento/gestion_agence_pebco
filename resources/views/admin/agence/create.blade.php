<form action="{{route('agence.store')}}" method="POST">
    @csrf
    <div class="modal fade" id="ModalAddagence" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agence</h4>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class=" control-label">Code de l'agence </label>
                        <div class="">
                            <input type="text" name="code_agence" class="form-control">
                            @error('code_agence')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" control-label">Nom de l'agence </label>
                        <div class="">
                            <input type="text" name="nom_agence" class="form-control">
                            @error('nom_agence')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" control-label">Région </label>
                        <div class="">
                            <select class="form-control" name="region_id">
                                <option value="">Veuillez choisir une région</option>
                                @foreach ( $regions as $region)
                                <option value="{{$region->id}}">{{$region->nom_region}}</option>
                                @error('region_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                @endforeach

                            </select>
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

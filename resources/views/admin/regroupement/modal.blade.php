<form action="{{route('regroupement')}}" method="POST">
    @csrf
    <div class="modal fade" id="ModalRegroupement" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Regroupement</h4>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class=" control-label">Région </label>
                        <div class="">
                            <select name="nom_region" id="" class="form-control">
                                <option value="">Choisir une région</option>
                                @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{$region->nom_region}}</option>
                                @endforeach
                            </select> @error('nom_region')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Exercice </label>
                        <div class="">
                            <select name="annee" id="" class="form-control">
                            <option value="">choisir une année</option>
                                @for ($i=2021; $i<=date('Y'); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor

                            </select> @error('nom_region')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Intitulé </label>
                        <div class="">
                            <select name="intitule" id="" class="form-control">
                            <option value="">choisir un intitulé</option>

                                <option value="budget">Budget</option>
                                <option value="realisation">Réalisation</option>


                            </select> @error('nom_region')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-info">Valider</button>
                </div>
            </div>
        </div>
    </div>
</form>

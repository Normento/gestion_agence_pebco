<form action="{{ route('previsionRealisers')}}" method="POST">
    @csrf
    <div class="modal fade" id="ModalPrev" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Opération</h4>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class=" control-label">Prévision </label>
                        <div class="">
                            <select class="form-control" name="prevision">
                                <option value="">Veuillez choisir une Prévision</option>
                                <option value="interet">Intérêt</option>
                                <option value="depense">Dépense</option>
                                <option value="frais">Frais client</option>
                            </select>

                            @error('prevision')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Agences </label>
                        <div class="">
                            <select class="form-control" name="agence">
                                <option value="">Veuillez choisir une Agence</option>
                                <option value="all">All</option>
                                @foreach ($response['response'] as $agence)
                                @foreach ($agences as $agenx)
                                @if ($agence->COD_AGENCE == $agenx->code_agence)
                                <option value="{{$agence->COD_AGENCE}}">{{$agenx->nom_agence}}</option>

                                @endif
                                @endforeach
                                @endforeach
                                @error('agence')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" control-label">Période </label>
                        <div class="">
                            <select class="form-control" name="periode">
                                <option value="">Veuillez choisir une période</option>
                                @foreach ($mois as $key => $month)
                                <option value="{{$key}}">{{$month}}</option>
                                @endforeach
                            </select>
                            @error('periode')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Année </label>
                        <div class="">
                            <select class="form-control" name="annee">
                                <option value="">Veuillez choisir une année</option>
                                @for ($a= 2020 ; $a <= date('Y'); $a++) <option value="{{$a}}">{{$a}}</option>
                                    @endfor
                            </select>
                            @error('annee')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Confirmer</button>
                </div>
            </div>
        </div>
    </div>
</form>

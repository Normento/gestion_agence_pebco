@extends('partial.app')
@section('content')
<h3><i class="fa fa-angle-right"></i> Frais client</h3>
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Frais client</h4>
            <form action="{{ route('fraisClient.store')}}" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Agence</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="code_agence" id="">
                            <option value="">Veuillez choisir une agence</option>
                            @foreach ($agences as $agence)
                            <option value="{{$agence->code_agence}}">{{$agence->nom_agence}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Année</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="annee" id="">
                            <option value="">Veuillez choisir une année</option>
                            @for ($i = 2021; $i<= date('Y'); $i++)
                             <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>
                        @error('annee')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Frais de dossier de crédits </label>
                    <div class="col-sm-10">
                        <input type="number" name="frais_dossier_credits" class="form-control" value="old('frais_dossier_credits')" require>
                        @error('frais_dossier_credits')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Commissions sur tontine</label>
                    <div class="col-sm-10">
                        <input type="number" name="commissions_tontine" class="form-control" :value="oldd('commissions_tontine')" require>
                        @error('commissions_tontine')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Frais de tenue de comptes </label>
                    <div class="col-sm-10">
                        <input type="number" name="frais_tenu_compte" class="form-control" :value="old('frais_tenu_compte')" require>
                        @error('frais_tenu_compte')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Pénalités sur prêts </label>
                    <div class="col-sm-10">
                        <input type="number" name="penalite_pret" class="form-control" :value="old('penalite_pret')" require>
                        @error('penalite_pret')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Autres commissions reçues</label>
                    <div class="col-sm-10">
                        <input type="number" name="autres_commission_recu" class="form-control" :value="old('autres_commission_recu')" require>
                        @error('autres_commission_recu')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Autres produits d'exploitation</label>
                    <div class="col-sm-10">
                        <input type="number" name="autre_produits_exploitation" class="form-control" :value="old('autre_produits_exploitation')" require>
                        @error('autre_produits_exploitation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-send">
                    <button type="submit" class="btn btn-large btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    <!-- col-lg-12-->
</div>

@endsection

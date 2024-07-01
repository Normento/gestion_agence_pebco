@extends('partial.app')
@section('content')
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Dépense</h4>
            <form id="regForm" method="POST" class="form-horizontal style-form" action="{{ route('depense.store')}}">
                @csrf
                <!-- One "tab" for each step in the form: -->
                <div class="tab">
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
                                @for ($i = 2021; $i<= date('Y'); $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                            @error('annee')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Carburants </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="carburants" oninput="this.className = ''" class="form-control" :value="old('carburants')" require>
                            @error('carburants')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Eau et Électricité </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="eau_electricite" oninput="this.className = ''" class="form-control" :value="old('eau_electricite')" require>
                            @error('eau_electricite')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Dépenses informatiques </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="depenses_informatiques" oninput="this.className = ''" class="form-control" :value="old('depenses_informatiques')" require>
                            @error('depenses_informatiques')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Imprimerie, fournitures de bureau et produits d'entretien </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="imprime_fourniture_prod_entretient" oninput="this.className = ''" class="form-control" :value="old('imprime_fourniture_prod_entretient')" require>
                            @error('imprime_fourniture_prod_entretient')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Frais de personnel (autres contrats ou intérim) </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="frais_personnel" oninput="this.className = ''" class="form-control" :value="old('frais_personnel')" require>
                            @error('frais_personnel')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Frais de formation </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="frais_formation" oninput="this.className = ''" class="form-control" :value="old('frais_formation')" require>
                            @error('frais_formation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Prestataire de service exploitation commerciale </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="prestation_service_exploitation_commerciale" oninput="this.className = ''" class="form-control" :value="old('prestation_service_exploitation_commerciale')" require>
                            @error('prestation_service_exploitation_commerciale')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Assurances du personnel </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="assurances_personnel" oninput="this.className = ''" class="form-control" :value="old('assurances_personnel')" require>
                            @error('assurances_personnel')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Locations d'immeubles </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="locations_immeubles" oninput="this.className = ''" class="form-control" :value="old('locations_immeubles')" require>
                            @error('locations_immeubles')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Assurances des biens </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="assurances_biens" oninput="this.className = ''" class="form-control" :value="old('assurances_biens')" require>
                            @error('assurances_biens')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Frais de maintenance des matériels et immeubles </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="frais_maintenance_materiels_immeubles" oninput="this.className = ''" class="form-control" :value="old('frais_maintenance_materiels_immeubles')" require>
                            @error('frais_maintenance_materiels_immeubles')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Missions et réception </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="missions_reception" oninput="this.className = ''" class="form-control" :value="old('missions_reception')" require>
                            @error('missions_reception')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Téléphone et télécommunications </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="telecom" oninput="this.className = ''" class="form-control" :value="old('telecom')" require>
                            @error('telecom')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Publicité et promotions </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="publicite_promotions" oninput="this.className = ''" class="form-control" :value="old('publicite_promotions')" require>
                            @error('publicite_promotions')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Charges pour réunions statutaires</label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="charges_reunions" oninput="this.className = ''" class="form-control" :value="old('charges_reunions')" require>
                            @error('charges_reunions')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Prestataires extérieurs hors exploitation commerciale </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="prestataires_exterieurs" oninput="this.className = ''" class="form-control" :value="old('prestataires_exterieurs')" require>
                            @error('prestataires_exterieurs')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Autres charges externes </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="autres_charges_externes" oninput="this.className = ''" class="form-control" :value="old('autres_charges_externes')" require>
                            @error('autres_charges_externes')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Dotation aux amortissements </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="dotation_amortissements" oninput="this.className = ''" class="form-control" :value="old('dotation_amortissements')" require>
                            @error('dotation_amortissements')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Autres charges exceptionnelles </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="autre_charge_excep" oninput="this.className = ''" class="form-control" :value="old('autre_charge_excep')" require>
                            @error('autre_charge_excep')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Autres produits exceptionnels </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="autre_produits_excep" oninput="this.className = ''" class="form-control" :value="old('autre_produits_excep')" require>
                            @error('autre_produits_excep')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>

               <!--  <div class="tab">


                </div> -->

                <div class="tab">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Frais personnel CDI </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="frais_personnel_cdi" oninput="this.className = ''" class="form-control" :value="old('frais_personnel_cdi')" require>
                            @error('frais_personnel_cdi')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Impôts et taxes </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="impot_taxes" oninput="this.className = ''" class="form-control" :value="old('impot_taxes')" require>
                            @error('impot_taxes')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Impôt sur bénéfice </label>
                        <div class="col-sm-10">
                            <input class="form" type="number" name="impot_sur_benefice" oninput="this.className = ''" class="form-control" :value="old('resultat_net')" require>
                            @error('impot_sur_benefice')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Retour</button>
                        <button type="button" class="btn btn-info" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <!-- <span class="step"></span> -->
                </div>

            </form>
        </div>
    </div>
</div>

</div>
@endsection

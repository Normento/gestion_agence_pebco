@extends('partial.app')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i>Intérêt  | <span>{{$fraisClient->fraitClient->nom_agence}}</span> | <span>{{$fraisClient->annee}}</span></h4>
                <hr>
                <tbody>
                    <tr>
                        <th class=""><i class=""></i> Frais de dossier de crédits</th>
                        <td class="">{{$fraisClient->frais_dossier_credits}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Commissions sur tontine</th>
                        <td class="">{{$fraisClient->commissions_tontine}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de tenue de comptes </th>
                        <td class="">{{$fraisClient->frais_tenu_compte}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Pénalités sur prêts</th>
                        <td class="">{{$fraisClient->penalite_pret}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres commissions reçues</th>
                        <td class="">{{$fraisClient->autres_commission_recu}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres produits d'exploitation</th>
                        <td class="">{{$fraisClient->autre_produits_exploitation}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Marge brute après coût du risque</th>
                        <td class="">{{$fraisClient->marge_brute_cout_risque}}</td>
                    </tr>
                    <tr>
                        <th class="bg-success"><i class=""></i>TOTAL</th>
                        <td class="bg-success">{{$fraisClient->frais_dossier_credits + $fraisClient->commissions_tontine + 
                            $fraisClient->frais_tenu_compte + $fraisClient->penalite_pret + $fraisClient->autres_commission_recu +
                            $fraisClient->autre_produits_exploitation +   $fraisClient->marge_brute_cout_risque}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
@endsection

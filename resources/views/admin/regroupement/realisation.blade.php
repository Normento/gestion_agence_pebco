@extends('partial.app')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <div class="table-responsive content-panel">
            <a id="lien" class="btn btn-primary " style="margin-left: 10px;" href="{{ route('prevision')}}"> <i class="fa fa-angle-left"></i> Retour</a>

            <h4>Tableau de suivi de la rentabilité des Régions</h4>
            <table class="table table-bordered" class="table table-striped table-advance table-hover">

                <div class="exportDiv">
                    @foreach ($regions as $regio)
                    @if ($regio->id == $region)
                    <h4><i class="fa fa-angle-right"></i>Réalisation {{$annee}} de {{ $regio->nom_region}} </h4>

                    @endif
                    @endforeach

                    <div class="formExport">

                        <div class="btnExport">

                            <a style="margin-right:10px;" class="btn btn-danger" target="blank" href="{{ route('exportPdfrealisationRegion')}}?exercice={{Crypt::encrypt($annee)}}&region={{Crypt::encrypt($region)}}"> <i class="fas fa-file-pdf"></i> Pdf</a>
                           <!--  <a class="btn btn-success" href=""><i class="fa-sharp fa-solid fa-file-excel"></i>Excel</a>-->
                        </div>

                    </div>
                </div>


                <hr>
                <thead>
                    <tr>
                        <th>Libelé</th>
                        <th>Budget de l'année</th>
                        <th colspan="2">Janvier</th>
                        <th colspan="2">Février</th>
                        <th colspan="2">Mars</th>
                        <th colspan="2">Avril</th>
                        <th colspan="2">Mai</th>
                        <th colspan="2">Juin</th>
                        <th colspan="2">Juillet</th>
                        <th colspan="2">Août</th>
                        <th colspan="2">Septembre</th>
                        <th colspan="2">Octobre</th>
                        <th colspan="2">Novembre</th>
                        <th colspan="2">Décembre</th>
                    </tr>
                </thead>
                <thead>
                    <th></th>
                    <th>Montant</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                    <th>Montant</th>
                    <th>% du budget</th>
                </thead>
                <tbody>

                    <tr>
                        <th class=""><i class=""></i> Intérêts reçus sur opérations avec la clientèle</th>
                        <td class="">{{$previsionsInterets->sum('interet_recu_operation_client')}}</td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',1)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',1)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',2)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',2)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',3)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',3)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',4)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',4)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',5)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',5)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',6)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',6)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',7)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',7)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',8)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',8)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',9)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',9)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',10)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',10)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',11)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',11)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',12)->sum('interet_recu_operation_client_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',12)->sum('interet_recu_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_recu_operation_client'))* 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Intérêts reçus sur opérations avec les tiers</th>
                        <td class="">{{$previsionsInterets->sum('interet_recus_operation_tiers')}}</td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',1)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',1)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',2)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',2)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',3)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',3)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',4)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',4)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',5)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',5)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',6)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',6)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',7)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',7)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',8)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',8)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',9)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',9)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',10)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',10)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',11)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',11)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',12)->sum('interet_recus_operation_tiers_realiser') / 1000}}

                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',12)->sum('interet_recus_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_recus_operation_tiers'))* 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Intérêts versés sur opérations avec la clientèle</th>
                        <td class="">{{$previsionsInterets->sum('interet_verse_operation_client')}}</td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',1)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',1)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',2)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',2)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',3)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',3)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',4)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',4)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',5)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',5)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',6)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',6)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',7)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',7)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',8)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',8)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',9)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',9)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',10)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',10)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',11)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',11)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',12)->sum('interet_verse_operation_client_realiser') /1000}}%
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',12)->sum('interet_verse_operation_client_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Intérêts versés sur opérations avec les tiers</th>
                        <td class="">{{$previsionsInterets->sum('interet_verse_operation_tiers')}}</td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',1)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',1)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',2)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',2)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',3)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',3)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',4)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',4)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',5)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',5)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',6)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',6)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',7)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',7)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',8)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',8)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',9)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',9)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',10)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',10)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',11)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',11)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',12)->sum('interet_verse_operation_tiers_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',12)->sum('interet_verse_operation_tiers_realiser') / 1000 / $previsionsInterets->sum('interet_verse_operation_client'))* 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Coût du risque net</th>
                        <td class="">{{$previsionsInterets->sum('cout_risque_net')}}</td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',1)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',1)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',2)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',2)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',3)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',3)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',4)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',4)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',5)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',5)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',6)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',6)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',7)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',7)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',8)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',8)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',9)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',9)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',10)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',10)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',11)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',11)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',12)->sum('cout_risque_net_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',12)->sum('cout_risque_net_realiser') / 1000 / $previsionsInterets->sum('cout_risque_net'))* 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Mage d'interêts après coût du risque</th>
                        <td class="">{{$previsionsInterets->sum('marge_interet_cout_risque')}}</td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',1)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',1)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',2)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',2)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',3)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',3)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',4)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',4)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',5)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',5)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',6)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',6)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',7)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',7)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',8)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',8)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',9)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',9)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',10)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',10)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',11)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',11)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                        <td>
                            {{$previsionsInteretRealiser->where('mois',12)->sum('marge_interet_cout_risque_realiser') / 1000}}
                        </td>
                        <td>
                            {{($previsionsInteretRealiser->where('mois',12)->sum('marge_interet_cout_risque_realiser') / 1000 / $previsionsInterets->sum('marge_interet_cout_risque'))* 100  }}%
                        </td>
                    </tr>


                    <tr>
                        <th class=""><i class=""></i> Frais de dossier de crédits</th>
                        <td class="">{{$previsionFraisClients->sum('frais_dossier_credits')}}</td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',1)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',1)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',2)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',2)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',3)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',3)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',4)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',4)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',5)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',5)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',6)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',6)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',7)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',7)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',8)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',8)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',9)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',9)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',10)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',10)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',11)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',11)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',12)->sum('frais_dossier_credits') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',12)->sum('frais_dossier_credits')  / 1000 / $previsionFraisClients->sum('frais_dossier_credits')) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Commissions sur tontine</th>
                        <td class="">{{$previsionFraisClients->sum('commissions_tontine')}}</td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',1)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',1)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',2)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',2)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',3)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',3)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',4)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',4)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',5)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',5)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',6)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',6)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',7)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',7)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',8)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',8)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',9)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',9)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',10)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',10)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',11)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',11)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',12)->sum('commissions_tontine') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',12)->sum('commissions_tontine') / 1000 / $previsionFraisClients->sum('commissions_tontine') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de tenue de comptes </th>
                        <td class="">{{$previsionFraisClients->sum('frais_tenu_compte')}}</td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',1)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',1)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',2)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',2)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',3)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',3)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',4)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',4)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',5)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',5)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',6)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',6)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',7)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',7)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',8)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',8)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',9)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',9)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',10)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',10)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',11)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',11)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',12)->sum('frais_tenu_compte') / 1000  }}
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',12)->sum('frais_tenu_compte') / 1000 / $previsionFraisClients->sum('frais_tenu_compte') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Pénalités sur prêts</th>
                        <td class="">{{$previsionFraisClients->sum('penalite_pret')}}</td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',1)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',1)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',2)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',2)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',3)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',3)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',4)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',4)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',5)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',5)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',6)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',6)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',7)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',7)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',8)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',8)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',9)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',9)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',10)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',10)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',11)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',11)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',12)->sum('penalite_pret') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',12)->sum('penalite_pret') / 1000 / $previsionFraisClients->sum('penalite_pret') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres commissions reçues</th>
                        <td class="">{{$previsionFraisClients->sum('autres_commission_recu')}}</td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',1)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',1)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',2)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',2)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',3)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',3)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',4)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',4)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',5)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',5)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',6)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',6)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',7)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',7)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',8)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',8)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',9)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',9)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',10)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',10)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',11)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',11)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',12)->sum('autres_commission_recu') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',12)->sum('autres_commission_recu') / 1000 / $previsionFraisClients->sum('autres_commission_recu') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres produits d'exploitation</th>
                        <td class="">{{$previsionFraisClients->sum('autre_produits_exploitation')}}</td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',1)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',1)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',2)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',2)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',3)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',3)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',4)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',4)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',5)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',5)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',6)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',6)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',7)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',7)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',8)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',8)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',9)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',9)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',10)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',10)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',11)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',11)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionFraisClientRealiser->where('mois',12)->sum('autre_produits_exploitation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionFraisClientRealiser->where('mois',12)->sum('autre_produits_exploitation') / 1000 / $previsionFraisClients->sum('autre_produits_exploitation') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Marge brute après coût du risque</th>
                        <td class="">{{$previsionFraisClients->sum('marge_brute_cout_risque') + $previsionsInterets->sum('marge_interet_cout_risque')}}</td>

                        <td>
                            {{($previsionFraisClientRealiser->where('mois',1)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',1)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',1)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',1)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',2)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',2)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',2)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',2)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',3)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',3)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',3)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',3)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',4)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',4)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',4)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',4)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',5)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',5)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',5)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',5)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',6)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',6)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',6)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',6)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',7)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',7)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',7)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',7)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',8)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',8)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',8)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',8)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',9)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',9)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',9)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',9)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',10)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',10)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',10)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',10)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',11)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',11)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',11)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',11)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                        <td>
                            {{($previsionFraisClientRealiser->where('mois',12)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',12)->sum('marge_interet_cout_risque_realiser') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionFraisClientRealiser->where('mois',12)->sum('marge_brute_cout_risque') / 1000 )+($previsionsInteretRealiser->where('mois',12)->sum('marge_interet_cout_risque_realiser') / 1000)) /($previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Carburants</th>
                        <td class="">{{$previsionDepenses->sum('carburants')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('carburants') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('carburants') / 1000 / $previsionDepenses->sum('carburants') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Eau et Électricité</th>
                        <td class="">{{$previsionDepenses->sum('eau_electricite')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',1)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',2)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',3)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',4)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',5)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',6)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',7)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',8)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',9)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',10)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',11)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('eau_electricite') / 1000  }}
                        </td>
                        <td>
                            {{(  $previsionDepenseRealiser->where('mois',12)->sum('eau_electricite') / 1000 / $previsionDepenses->sum('eau_electricite') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Dépenses informatiques </th>
                        <td class="">{{$previsionDepenses->sum('depenses_informatiques')}}</td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',1)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',2)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',3)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',4)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',5)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',6)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',7)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',8)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',9)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',10)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',11)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',12)->sum('depenses_informatiques') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('depenses_informatiques') / 1000 / $previsionDepenses->sum('depenses_informatiques') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Imprimés, fournitures de bureau et produits d'entretien</th>
                        <td class="">{{$previsionDepenses->sum('imprime_fourniture_prod_entretient')}}</td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('imprime_fourniture_prod_entretient') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('imprime_fourniture_prod_entretient') / 1000 / $previsionDepenses->sum('imprime_fourniture_prod_entretient') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> S/T comptes 61</th>
                        <td class="">{{$previsionDepenses->sum('compte61')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('compte61') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('compte61') / 1000 / $previsionDepenses->sum('compte61') ) * 100  }}%
                        </td>
                    <tr>
                        <th class=""><i class=""></i> Frais de personnel (autres contrats ou intérim)</th>
                        <td class="">{{$previsionDepenses->sum('frais_personnel')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('frais_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('frais_personnel') / 1000 / $previsionDepenses->sum('frais_personnel') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de formation</th>
                        <td class="">{{$previsionDepenses->sum('frais_formation')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('frais_formation') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('frais_formation') / 1000 / $previsionDepenses->sum('frais_formation')  ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Prestataire de service exploitation commerciale</th>
                        <td class="">{{$previsionDepenses->sum('prestation_service_exploitation_commerciale')}}</td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('prestation_service_exploitation_commerciale') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('prestation_service_exploitation_commerciale') / 1000 / $previsionDepenses->sum('prestation_service_exploitation_commerciale') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Assurances du personnel</th>
                        <td class="">{{$previsionDepenses->sum('assurances_personnel')}}</td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('assurances_personnel') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('assurances_personnel') / 1000 / $previsionDepenses->sum('assurances_personnel') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Locations d'immeubles</th>
                        <td class="">{{$previsionDepenses->sum('locations_immeubles')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('locations_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('locations_immeubles') / 1000 / $previsionDepenses->sum('locations_immeubles')  ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Assurances des biens</th>
                        <td class="">{{$previsionDepenses->sum('assurances_biens')}}</td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('assurances_biens') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('assurances_biens') / 1000 / $previsionDepenses->sum('assurances_biens')  ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de maintenance des matériels et immeubles</th>
                        <td class="">{{$previsionDepenses->sum('frais_maintenance_materiels_immeubles')}}</td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('frais_maintenance_materiels_immeubles') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('frais_maintenance_materiels_immeubles') / 1000 / $previsionDepenses->sum('frais_maintenance_materiels_immeubles')  ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Missions et réception</th>
                        <td class="">{{$previsionDepenses->sum('missions_reception')}}</td>

                        <td>
                            {{ $previsionDepenseRealiser->where('mois',1)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',2)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',3)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',4)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',5)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',6)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',7)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',8)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',9)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',10)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',11)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',12)->sum('missions_reception') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('missions_reception') / 1000 / $previsionDepenses->sum('missions_reception')  ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Téléphone et télécommunications</th>
                        <td class="">{{$previsionDepenses->sum('telecom')}}</td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('telecom') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('telecom') / 1000 / $previsionDepenses->sum('telecom')) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Publicité et promotions</th>
                        <td class="">{{$previsionDepenses->sum('publicite_promotions')}}</td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('publicite_promotions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('publicite_promotions') / 1000 / $previsionDepenses->sum('publicite_promotions') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Charges pour réunions statutaires</th>
                        <td class="">{{$previsionDepenses->sum('charges_reunions')}}</td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('charges_reunions') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('charges_reunions')  / 1000 / $previsionDepenses->sum('charges_reunions')  ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Prestataires extérieurs hors exploitation commerciale</th>
                        <td class="">{{$previsionDepenses->sum('prestataires_exterieurs')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('prestataires_exterieurs') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('prestataires_exterieurs') / 1000 / $previsionDepenses->sum('prestataires_exterieurs') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres charges externes</th>
                        <td class="">{{$previsionDepenses->sum('autres_charges_externes')}}</td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('autres_charges_externes') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('autres_charges_externes') / 1000 / $previsionDepenses->sum('autres_charges_externes')  ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Fonds de garantie UMOA</th>
                        <td class="">{{$previsionDepenses->sum('fond_garantie_uemoa')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',1)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',2)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',3)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',4)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',5)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',6)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',7)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',8)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',9)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',10)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',11)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('fond_garantie_uemoa') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',12)->sum('fond_garantie_uemoa') / 1000 / $previsionDepenses->sum('fond_garantie_uemoa')  ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Taxes et Impôts (hors Impôts sur les bénéfices)</th>
                        <td class="">{{$previsionDepenses->sum('taxes_impot')}}</td>

                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('taxes_impot') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('taxes_impot') / 1000 / $previsionDepenses->sum('taxes_impot') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Frais personnel CDI</th>
                        <td class="">{{$previsionDepenses->sum('frais_personnel_cdi')}}</td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',1)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',1)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',2)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',2)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',3)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',3)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                         <td>
                            {{ $previsionDepenseRealiser->where('mois',4)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',4)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',5)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',5)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',6)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',6)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',7)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',7)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',8)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',8)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',9)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',9)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',10)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',10)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',11)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',11)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                        <td>
                            {{ $previsionDepenseRealiser->where('mois',12)->sum('frais_personnel_cdi') / 1000  }}
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',12)->sum('frais_personnel_cdi') / 1000 / $previsionDepenses->sum('frais_personnel_cdi')  ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Excédent brut avant amortissements</th>
                        <td class="">{{($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque'))}}</td>

                        <td>
                            {{($previsionDepenseRealiser->where('mois',1)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',1)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',1)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',1)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',1)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',1)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',2)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',2)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',2)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',2)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',2)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',2)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',3)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',3)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',3)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',3)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',3)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',3)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',4)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',4)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',4)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',4)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',4)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',4)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',5)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',5)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',5)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',5)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',5)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',5)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',6)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',6)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',6)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',6)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',6)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',6)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',7)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',7)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',7)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',7)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',7)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',7)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',8)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',8)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',8)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',8)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',8)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',8)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',9)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',9)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',9)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',9)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',9)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',9)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',10)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',10)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',10)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',10)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',10)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',10)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',11)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',11)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',11)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',11)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',11)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',11)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',12)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',12)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',12)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',12)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',12)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',12)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Dotation aux amortissements</th>
                        <td class="">{{$previsionDepenses->sum('dotation_amortissements')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('dotation_amortissements') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('dotation_amortissements') / 1000 / $previsionDepenses->sum('dotation_amortissements') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>

                        <th class=""><i class=""></i> Résultat courant après autres impôts et taxes</th>
                        <td class="">{{$previsionDepenses->sum('resultat_courant_avant_impot_taxe') + $previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') }}</td>

                        <td>
                            {{($previsionDepenseRealiser->where('mois',1)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',1)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',1)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',1)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',1)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',1)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',1)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',1)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',2)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',2)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',2)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',2)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',2)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',2)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',2)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',2)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',3)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',3)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',3)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',3)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',3)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',3)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',3)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',3)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',4)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',4)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',4)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',4)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',4)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',4)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',4)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',4)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',5)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',5)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',5)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',5)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',5)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',5)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',5)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',5)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',6)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',6)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',6)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',6)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',6)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',6)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',6)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',6)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',7)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',7)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',7)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',7)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',7)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',7)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',7)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',7)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',8)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',8)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',8)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',8)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',8)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',8)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',8)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',8)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',9)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',9)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',9)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',9)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',9)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',9)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',9)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',9)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',10)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',10)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',10)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',10)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',10)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',10)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',10)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',10)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',11)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',11)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',11)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',11)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',11)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',11)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',11)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',11)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',12)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',12)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',12)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',12)->sum('marge_brute_cout_risque') / 1000)   }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',12)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',12)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',12)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',12)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')  ) )* 100 }}%
                        </td>
                    </tr>

                    <tr>
                        <th class=""><i class=""></i> Autres charges exceptionnelles</th>
                        <td class="">{{$previsionDepenses->sum('autre_charge_excep')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('autre_charge_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('autre_charge_excep') / 1000 / $previsionDepenses->sum('autre_charge_excep') ) * 100  }}%
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres produits exceptionnels</th>
                        <td class="">{{$previsionDepenses->sum('autre_produits_excep')}}</td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',1)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',1)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',2)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',2)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',3)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',3)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',4)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',4)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',5)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',5)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',6)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',6)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',7)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',7)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',8)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',8)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',9)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',9)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',10)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',10)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',11)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',11)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>
                        <td>
                            {{$previsionDepenseRealiser->where('mois',12)->sum('autre_produits_excep') / 1000  }}
                        </td>
                        <td>
                            {{( $previsionDepenseRealiser->where('mois',12)->sum('autre_produits_excep') / 1000 / $previsionDepenses->sum('autre_produits_excep') ) * 100  }}%
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Impôt sur bénéfice</th>
                        <td class="">{{$previsionDepenses->sum('impot_sur_benefice')}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>


                        <th class=""><i class=""></i> Resultat net</th>
                        <td class="">{{$previsionDepenses->sum('resultat_net') + $previsionDepenses->sum('resultat_courant_avant_impot_taxe') + $previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque')}}</td>

                        <td>
                            {{($previsionDepenseRealiser->where('mois',1)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',1)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',1)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',1)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',1)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',1)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',1)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',1)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',1)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',1)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',2)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',2)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',2)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',2)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',2)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',2)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',2)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',2)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',2)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',2)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',3)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',3)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',3)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',3)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',3)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',3)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',3)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',3)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',3)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',3)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',4)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',4)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',4)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',4)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',4)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',4)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',4)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',4)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',4)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',4)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',5)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',5)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',5)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',5)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',5)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',5)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',5)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',5)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',5)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',5)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',6)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',6)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',6)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',6)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',6)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',6)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',6)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',6)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',6)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',6)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',7)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',7)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',7)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',7)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',7)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',7)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',7)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',7)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',7)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',7)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',8)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',8)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',8)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',8)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',8)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',8)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',8)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',8)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',8)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',8)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',9)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',9)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',9)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',9)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',9)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',9)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',9)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',9)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',9)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',9)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',10)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',10)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',10)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',10)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',10)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',10)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',10)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',10)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',10)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',10)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',11)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',11)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',11)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',11)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',11)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',11)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',11)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',11)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',11)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',11)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                        <td>
                            {{($previsionDepenseRealiser->where('mois',12)->sum('resultat_net') / 1000)+($previsionDepenseRealiser->where('mois',12)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',12)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',12)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',12)->sum('marge_brute_cout_risque') / 1000)  }}
                        </td>
                        <td>
                            {{((($previsionDepenseRealiser->where('mois',12)->sum('resultat_net') / 1000) + ($previsionDepenseRealiser->where('mois',12)->sum('resultat_courant_avant_impot_taxe') / 1000) + ($previsionDepenseRealiser->where('mois',12)->sum('excedent_brute_avant_amortissement') / 1000) + ($previsionsInteretRealiser->where('mois',12)->sum('marge_interet_cout_risque_realiser') / 1000) + ($previsionFraisClientRealiser->where('mois',12)->sum('marge_brute_cout_risque') / 1000))/ ($previsionDepenses->sum('resultat_net')+$previsionDepenses->sum('resultat_courant_avant_impot_taxe') +$previsionDepenses->sum('excedent_brute_avant_amortissement') + $previsionsInterets->sum('marge_interet_cout_risque') + $previsionFraisClients->sum('marge_brute_cout_risque') ) )* 100 }}%
                        </td>
                    </tr>



                </tbody>

            </table>
        </div>
        <!-- /content-panel -->
    </div>

    <!-- /col-md-12 -->
</div>

<style>
    .search {
        display: flex;
        margin-top: 20px;
        justify-content: start;

    }

    button {
        margin: 4px;
        margin-top: -1px;
    }

    input {
        margin: 4px;
    }

    select {
        margin: 5px;
    }

    #lien {
        margin-left: 5px;
    }
</style>
@endsection

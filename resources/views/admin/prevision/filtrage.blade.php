@extends('partial.app')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <div class="table-responsive content-panel">
            <a id="lien" class="btn btn-primary ml-5" href="{{ route('prevision')}}"> <i class="fa fa-angle-left"></i> Retour</a>

            <h4>Tableau de suivi de la rentabilité des agences</h4>
            <table class="table table-bordered" class="table table-striped table-advance table-hover">
                @if ($previsionsInterets->count() > 0 || $previsionDepenses->count() > 0 || $previsionFraisClients->count() > 0 )
                @foreach ($previsionsInterets as $previsionsInteret )
                <div class="exportDiv">
                    <h4><i class="fa fa-angle-right"></i>Réalisation {{ $previsionsInteret->annee}} de {{$previsionsInteret->agence->nom_agence}} </h4>
                    <div class="formExport">

                        <div class="btnExport">

                            <a style="margin-right:10px;" class="btn btn-danger" target="blank" href="{{ route('pdfrealisation')}}?exercice={{Crypt::encrypt($annee)}}&agence={{Crypt::encrypt($agence)}}"> <i class="fas fa-file-pdf"></i> Pdf</a>
                            <a class="btn btn-success" href=""><i class="fa-sharp fa-solid fa-file-excel"></i>Excel</a>
                        </div>

                    </div>
                </div>

                @endforeach
                @else
                <h4><i class="fa fa-angle-right"></i>Pevision {{ $annee}} de @foreach ($agences as $agenx)
                    {{$agenx->code_agence == $agence ? $agenx->nom_agence : ''}}
                    @endforeach
                </h4>


                @endif

                <form class="form-group col-md-6 ml-3" action="{{ route('prevision.filtrage')}}" method="post" id="search-form">
                    @csrf
                    <div class="search">
                        @if (Auth::user()->role == 1 || Auth::user()->role == 0)
                        <select name="agence" id="" class="form-control">
                            <option value="">veuillez choisir une agence</option>
                            @foreach ($agences as $agenc)
                            @if ($agenc->nom_agence != "Direction")
                            <option value="{{$agenc->code_agence}}">{{$agenc->nom_agence}}</option>

                            @endif
                            @endforeach

                        </select>
                        @else
                        <input type="hidden" name="agence" value="{{Auth::user()->code_agence}}">
                        @endif
                        <select name="annee" height='50px' id="" class="form-control">
                            <option value="">veuillez choisir une année</option>
                            @for ($i = 2021; $i<= date('Y'); $i++) <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>

                        <button class="btn btn-info" type="submit">Recherche</button>
                    </div>
                </form>
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
                    @if ($previsionsInterets->count() > 0 || $previsionFraisClients->count() > 0 || $previsionDepenses->count() > 0)


                    @foreach ($previsionsInterets as $previsionsInteret)
                    <tr>
                        <th class=""><i class=""></i> Intérêts reçus sur opérations avec la clientèle</th>
                        <td class="">{{$previsionsInteret->interet_recu_operation_client}}</td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            {{$interet->interet_recu_operation_client_realiser / 1000}}
                            @endforeach
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser / 1000}}


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser /1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recu_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recu_operation_client_realiser / 1000 / $previsionsInteret->interet_recu_operation_client)* 100  }}%

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Intérêts reçus sur opérations avec les tiers</th>
                        <td class="">{{$previsionsInteret->interet_recus_operation_tiers}}</td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_recus_operation_tiers_realiser / 1000}}


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_recus_operation_tiers_realiser / 1000 / $previsionsInteret->interet_recus_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Intérêts versés sur opérations avec la clientèle</th>
                        <td class="">{{$previsionsInteret->interet_verse_operation_client}}</td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser /1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_client_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_client_realiser / 1000 / $previsionsInteret->interet_verse_operation_client)* 100  }}%

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Intérêts versés sur opérations avec les tiers</th>
                        <td class="">{{$previsionsInteret->interet_verse_operation_tiers}}</td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->interet_verse_operation_tiers_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',13)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->interet_verse_operation_tiers_realiser / 1000 / $previsionsInteret->interet_verse_operation_tiers)* 100  }}%

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Coût du risque net</th>
                        <td class="">{{$previsionsInteret->cout_risque_net}}</td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000 }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->cout_risque_net_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->cout_risque_net_realiser / 1000 / $previsionsInteret->cout_risque_net)* 100  }}%

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Mage d'interêts après coût du risque</th>
                        <td class="">{{$previsionsInteret->marge_interet_cout_risque}}</td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{$interet->marge_interet_cout_risque_realiser / 1000}}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            {{($interet->marge_interet_cout_risque_realiser / 1000 / $previsionsInteret->marge_interet_cout_risque)* 100  }}%

                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                    @foreach ($previsionFraisClients as $previsionFraisClient )
                    <tr>
                        <th class=""><i class=""></i> Frais de dossier de crédits</th>
                        <td class="">{{$previsionFraisClient->frais_dossier_credits}}</td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits  / 1000 / $previsionFraisClient->frais_dossier_credits) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_dossier_credits / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_dossier_credits / 1000 / $previsionFraisClient->frais_dossier_credits ) * 100  }}%

                            @endforeach
                        </td>


                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Commissions sur tontine</th>
                        <td class="">{{$previsionFraisClient->commissions_tontine}}</td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->commissions_tontine / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->commissions_tontine / 1000 / $previsionFraisClient->commissions_tontine ) * 100  }}%

                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de tenue de comptes </th>
                        <td class="">{{$previsionFraisClient->frais_tenu_compte}}</td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->frais_tenu_compte / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->frais_tenu_compte / 1000 / $previsionFraisClient->frais_tenu_compte ) * 100  }}%

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Pénalités sur prêts</th>
                        <td class="">{{$previsionFraisClient->penalite_pret}}</td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->penalite_pret / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->penalite_pret / 1000 / $previsionFraisClient->penalite_pret ) * 100  }}%

                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres commissions reçues</th>
                        <td class="">{{$previsionFraisClient->autres_commission_recu}}</td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autres_commission_recu / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{( $frais->autres_commission_recu / 1000 / $previsionFraisClient->autres_commission_recu ) * 100  }}%

                            @endforeach
                        </td>


                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres produits d'exploitation</th>
                        <td class="">{{$previsionFraisClient->autre_produits_exploitation}}</td>

                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)

                            {{$frais->autre_produits_exploitation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->autre_produits_exploitation != 0)
                            {{( $frais->autre_produits_exploitation / 1000 / $previsionFraisClient->autre_produits_exploitation ) * 100  }}%

                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        @foreach ( $previsionsInterets as $previsionsInteret)


                        <th class=""><i class=""></i> Marge brute après coût du risque</th>
                        <td class="">{{$previsionFraisClient->marge_brute_cout_risque + $previsionsInteret->marge_interet_cout_risque}}</td>

                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_brute_cout_risque != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            {{($frais->marge_brute_cout_risque / 1000 )+($interet->marge_interet_cout_risque_realiser / 1000)  }}
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)

                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @if ($frais->marge_brute_cout_risque != 0 && $interet->marge_interet_cout_risque_realiser != 0)
                            {{((($frais->marge_brute_cout_risque /1000 ) + ($interet->marge_interet_cout_risque_realiser/ 1000)) /($previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque ) )* 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                        </td>
                        @endforeach

                    </tr>
                    @endforeach
                    @foreach ($previsionDepenses as $previsionDepense )
                    <tr>
                        <th class=""><i class=""></i>Carburants</th>
                        <td class="">{{$previsionDepense->carburants}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->carburants / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->carburants / 1000 / $previsionDepense->carburants ) * 100  }}%

                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Eau et Électricité</th>
                        <td class="">{{$previsionDepense->eau_electricite}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->eau_electricite != 0)


                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->eau_electricite / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->eau_electricite / 1000 / $previsionDepense->eau_electricite ) * 100  }}%

                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Dépenses informatiques </th>
                        <td class="">{{$previsionDepense->depenses_informatiques}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->depenses_informatiques !=0 )

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->depenses_informatiques / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->depenses_informatiques / 1000 / $previsionDepense->depenses_informatiques ) * 100  }}%

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Imprimés, fournitures de bureau et produits d'entretien</th>
                        <td class="">{{$previsionDepense->imprime_fourniture_prod_entretient}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->imprime_fourniture_prod_entretient / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->imprime_fourniture_prod_entretient / 1000 / $previsionDepense->imprime_fourniture_prod_entretient ) * 100  }}%

                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i> S/T comptes 61</th>
                        <td class="">{{$previsionDepense->compte61}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->compte61 / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->compte61 / 1000 / $previsionDepense->compte61 ) * 100  }}%

                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de personnel (autres contrats ou intérim)</th>
                        <td class="">{{$previsionDepense->frais_personnel}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_personnel / 1000 / $previsionDepense->frais_personnel ) * 100  }}%

                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de formation</th>
                        <td class="">{{$previsionDepense->frais_formation}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%
                            @else
                            0%
                            @endif


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%
                            @else
                            0%
                            @endif


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%

                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%

                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%
                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%
                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%
                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%
                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%
                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%
                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%
                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_formation / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ( $depense->frais_formation != 0)
                            {{( $depense->frais_formation / 1000 / $previsionDepense->frais_formation  ) * 100  }}%
                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Prestataire de service exploitation commerciale</th>
                        <td class="">{{$previsionDepense->prestation_service_exploitation_commerciale}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->prestation_service_exploitation_commerciale / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestation_service_exploitation_commerciale / 1000 / $previsionDepense->prestation_service_exploitation_commerciale ) * 100  }}%


                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Assurances du personnel</th>
                        <td class="">{{$previsionDepense->assurances_personnel}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_personnel / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_personnel != 0)
                            {{( $depense->assurances_personnel / 1000 / $previsionDepense->assurances_personnel  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Locations d'immeubles</th>
                        <td class="">{{$previsionDepense->locations_immeubles}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->locations_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->locations_immeubles != 0)
                            {{( $depense->locations_immeubles / 1000 / $previsionDepense->locations_immeubles  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Assurances des biens</th>
                        <td class="">{{$previsionDepense->assurances_biens}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->assurances_biens / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->assurances_biens != 0)
                            {{( $depense->assurances_biens / 1000 / $previsionDepense->assurances_biens  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Frais de maintenance des matériels et immeubles</th>
                        <td class="">{{$previsionDepense->frais_maintenance_materiels_immeubles}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_maintenance_materiels_immeubles != 0)


                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%
                            @else
                            0%
                            @endif

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->frais_maintenance_materiels_immeubles / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->frais_maintenance_materiels_immeubles / 1000 / $previsionDepense->frais_maintenance_materiels_immeubles  ) * 100  }}%


                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Missions et réception</th>
                        <td class="">{{$previsionDepense->missions_reception}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->missions_reception != 0)


                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%

                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->missions_reception / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{($depense->missions_reception / 1000 / $previsionDepense->missions_reception  ) * 100  }}%


                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Téléphone et télécommunications</th>
                        <td class="">{{$previsionDepense->telecom}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->telecom / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->telecom  / 1000 / $previsionDepense->telecom) * 100  }}%


                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Publicité et promotions</th>
                        <td class="">{{$previsionDepense->publicite_promotions}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->publicite_promotions != 0)


                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{$depense->publicite_promotions / 1000  }}

                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)

                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%


                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->publicite_promotions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->publicite_promotions / 1000 / $previsionDepense->publicite_promotions ) * 100  }}%
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Charges pour réunions statutaires</th>
                        <td class="">{{$previsionDepense->charges_reunions}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->charges_reunions / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->charges_reunions != 0)
                            {{( $depense->charges_reunions / 1000 / $previsionDepense->charges_reunions  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Prestataires extérieurs hors exploitation commerciale</th>
                        <td class="">{{$previsionDepense->prestataires_exterieurs}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->prestataires_exterieurs / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->prestataires_exterieurs / 1000 / $previsionDepense->prestataires_exterieurs  ) * 100  }}%
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres charges externes</th>
                        <td class="">{{$previsionDepense->autres_charges_externes}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autres_charges_externes != 0)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autres_charges_externes / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autres_charges_externes / 1000 / $previsionDepense->autres_charges_externes  ) * 100  }}%
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Fonds de garantie UMOA</th>
                        <td class="">{{$previsionDepense->fond_garantie_uemoa}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->fond_garantie_uemoa / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->fond_garantie_uemoa / 1000 / $previsionDepense->fond_garantie_uemoa  ) * 100  }}%
                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Taxes et Impôts (hors Impôts sur les bénéfices)</th>
                        <td class="">{{$previsionDepense->taxes_impot}}</td>

                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->taxes_impot / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->taxes_impot != 0)
                            {{( $depense->taxes_impot / 1000 / $previsionDepense->taxes_impot ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>

                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Frais personnel CDI</th>
                        <td class="">{{$previsionDepense->frais_personnel_cdi}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->frais_personnel_cdi / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->frais_personnel_cdi != 0)
                            {{( $depense->frais_personnel_cdi / 1000 / $previsionDepense->frais_personnel_cdi  ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        @foreach ( $previsionsInterets as $previsionsInteret)
                        @foreach ($previsionFraisClients as $previsionFraisClient)


                        <th class=""><i class=""></i> Excédent brut avant amortissements</th>
                        <td class="">{{($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque)}}</td>

                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque+ $previsionDepense->resultat_courant_avant_impot_taxe   ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        @endforeach
                        @endforeach
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Dotation aux amortissements</th>
                        <td class="">{{$previsionDepense->dotation_amortissements}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->dotation_amortissements / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->dotation_amortissements / 1000 / $previsionDepense->dotation_amortissements ) * 100  }}%
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        @foreach ($previsionsInterets as $previsionsInteret)
                        @foreach ($previsionFraisClients as $previsionFraisClient)


                        <th class=""><i class=""></i> Résultat courant après autres impôts et taxes</th>
                        <td class="">{{$previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque }}</td>

                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque  ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        @endforeach
                        @endforeach
                    </tr>

                    <tr>
                        <th class=""><i class=""></i> Autres charges exceptionnelles</th>
                        <td class="">{{$previsionDepense->autre_charge_excep}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_charge_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_charge_excep != 0)
                            {{( $depense->autre_charge_excep / 1000 / $previsionDepense->autre_charge_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Autres produits exceptionnels</th>
                        <td class="">{{$previsionDepense->autre_produits_excep}}</td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_produits_excep != 0)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->autre_produits_excep != 0)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @else
                            0%
                            @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{$depense->autre_produits_excep / 1000  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{( $depense->autre_produits_excep / 1000 / $previsionDepense->autre_produits_excep ) * 100  }}%
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i>Impôt sur bénéfice</th>
                        <td class="">{{$previsionDepense->impot_sur_benefice}}</td>
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
                        @foreach ($previsionsInterets as $previsionsInteret)
                        @foreach ($previsionFraisClients as $previsionFraisClient)

                        <th class=""><i class=""></i> Resultat net</th>
                        <td class="">{{$previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque}}</td>


                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',1)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',2)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',3)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',4)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',5)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',6)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',7)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',8)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',9)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',10)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',11)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            {{($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000)+($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000)  }}
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        <td>
                            @foreach ($previsionsInteret['interetsRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $interet)
                            @foreach ($previsionFraisClient['fraisRealisers']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $frais)
                            @foreach ($previsionDepense['depenseRealiser']->where('mois',12)->where('annee','=', $annee)->where('code_agence','=', $agence) as $depense)
                            @if ($depense->resultat_net != 0 && $depense->excedent_brute_avant_amortissement != 0 || $interet->marge_interet_cout_risque_realiser != 0 || $frais->marge_brute_cout_risque)
                            {{((($depense->resultat_net / 1000)+($depense->resultat_courant_avant_impot_taxe / 1000) + ($depense->excedent_brute_avant_amortissement / 1000) + ($interet->marge_interet_cout_risque_realiser / 1000) + ($frais->marge_brute_cout_risque / 1000))/ ($previsionDepense->resultat_net + $previsionDepense->excedent_brute_avant_amortissement + $previsionsInteret->marge_interet_cout_risque + $previsionFraisClient->marge_brute_cout_risque +$previsionDepense->resultat_courant_avant_impot_taxe ) )* 100 }}%
                            @else
                            0%
                            @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </td>
                        @endforeach
                        @endforeach
                    </tr>


                    @endforeach

                    @else
                    <td colspan="20" style="text-align: center;"> Aucune prévision</td>

                    @endif
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

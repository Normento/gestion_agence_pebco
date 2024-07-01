@extends('partial.app')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Intérêt | <span>{{$interet->agence->nom_agence}}</span> | <span>{{$interet->annee}}</span></h4>
                <hr>
                <tbody>
                    <tr>
                        <th class=""><i class=""></i> Intérêts reçus sur opérations avec la clientèle</th>
                        <td class="">{{$interet->interet_recu_operation_client}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> intérêts reçus sur opérations avec les tiers</th>
                        <td class="">{{$interet->interet_recus_operation_tiers}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Intérêts versés sur opérations avec la clientèle</th>
                        <td class="">{{$interet->interet_verse_operation_client}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> intérêts versés sur opérations avec les tiers</th>
                        <td class="">{{$interet->interet_verse_operation_tiers}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Coût du risque net</th>
                        <td class="">{{$interet->cout_risque_net}}</td>
                    </tr>
                    <tr>
                        <th class=""><i class=""></i> Mage d'interêts après coût du risque</th>
                        <td class="">{{$interet->marge_interet_cout_risque}}</td>
                    </tr>
                    <tr>
                        <th class="bg-success bg-gradient"><i class=""></i> TOTAL</th>
                        <td class="bg-success bg-gradient">{{$interet->interet_recu_operation_client + $interet->interet_recus_operation_tiers +
                            $interet->interet_verse_operation_client + $interet->interet_verse_operation_tiers+
                            $interet->cout_risque_net + $interet->marge_interet_cout_risque}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
@endsection

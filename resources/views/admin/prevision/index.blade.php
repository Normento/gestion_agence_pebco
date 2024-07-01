@extends('partial.app')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <div class="table-responsive content-panel">
            <div class="tableHeader">
                <h4>Tableau de suivi de la rentabilité des agences</h4>


                <div>
                    <a class="btn btn-primary" data-toggle="modal" id="regroupement" data-target="#ModalRegroupement" href="#">Réalisation regionale</a>
                    @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                    <a class="btn btn-success" data-toggle="modal" data-target="#ModalPrev">Réalisation</a>
                    @endif
                </div>


            </div>
            @include('admin.regroupement.modal')
            <table class="table table-bordered" class="table table-striped table-advance table-hover">
                <div class="">


                </div>
                @include('admin.prevision.operation')
                <form class="form-group col-md-6 ml-3" action="{{ route('prevision.filtrage')}}" method="post" id="search-form">
                    @csrf
                    <div class="search">
                        @if (Auth::user()->role == 1 || Auth::user()->role == 0)
                        <select name="agence" id="" class="form-control">
                            <option value="">veuillez choisir une agence</option>
                            @foreach ($agences as $agence)
                            @if ($agence->nom_agence != "Direction")
                            <option value="{{ $agence->code_agence}}">{{$agence->nom_agence}}</option>

                            @endif
                            @endforeach

                        </select>
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


                    <td style="text-align: center;" colspan="26">Veuillez effectuer une recherche</td>
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

    .tableHeader {
        display: flex;
        justify-content: space-between;
    }

    .tableHeader a {
        margin-right: 10px;
    }
</style>
@endsection

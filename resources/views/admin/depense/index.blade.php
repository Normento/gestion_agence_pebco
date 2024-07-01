@extends('partial.app')
@section('content')


<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i>Dépense</h4>
            @for ($i = 2021; $i<= date('Y'); $i++) <div class="accordion">
                {{$i}}
        </div>
        <div class="panel">
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th><i class="" aria-hidden="true"></i>Agence</th>
                        <th><i class="" aria-hidden="true"></i>Prévision des Carburants</th>
                        <th><i class="" aria-hidden="true"></i>Eau et Électricité</th>
                        <th><i class="" aria-hidden="true"></i>Dépenses informatiques </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($depenses->where('annee',$i) as $depense)

                    <tr>
                        <td class="">{{$depense->depense->nom_agence}}</td>
                        <td>{{$depense->carburants}} </td>
                        <td class="">{{$depense->eau_electricite}}</td>
                        <td class="">{{$depense->depenses_informatiques}}</td>

                        <td>
                            <a class="btn btn-danger btn-xs" title="Détaille" data-toggle="modal" href="{{ route('depense.show',$depense->id)}}"><i class="fa fa-eye"></i></a>
                            @if ( Auth::user()->role == 1)
                            <a class="btn btn-info btn-xs" title="Modifier" href="{{ route('depense.edit',$depense->id)}}"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal" data-target="#ModalDeletedepense{{$depense->id}}"><i class="fa fa-trash-o "></i></button>
                        </td>
                        @include('admin.depense.delete')
                        @endif
                    </tr>

                    @empty
                    <td colspan="3"> Auncune depense enrégistrée</td>

                    @endforelse
                </tbody>
                <p>{{$depenses->links()}}</p>
            </table>
        </div>

        @endfor

    </div>
    <!-- /content-panel -->
</div>
<!-- /col-md-12 -->
</div>

@endsection

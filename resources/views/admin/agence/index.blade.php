@extends('partial.app')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <div class="table-head ">
                    <h4><i class="fa fa-angle-right"></i>Agences</h4>
                    <a class="btn btn-info " data-toggle="modal" data-target="#ModalAddagence" href="#">Ajouter un
                        poste</a>
                </div>
                <hr>
                <thead>
                    <tr>
                        <th class=""><i class=""></i> Code </th>
                        <th class=""><i class=""></i> Nom </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($agences->count() > 0 )
                    @foreach ($agences as $agence)
                    <tr>
                        <td class="">{{$agence->code_agence}}</td>
                        <td class="">{{$agence->nom_agence}}</td>
                        <td>
                            <button class="btn btn-info btn-xs" title="Supprimer" data-toggle="modal"
                                data-target="#ModalEdit{{$agence->id}}"><i class="fa fa-edit "></i></button>
                            <button class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal"
                                data-target="#ModalDelete{{$agence->id}}"><i class="fa fa-trash-o "></i></button>
                        </td>
                    </tr>
                    @include('admin.agence.delete')
                    @include('admin.agence.edit')
                    @endforeach
                    @else
                    <td colspan="3">Aucune agence enrégistrée</td>
                    @endif

                </tbody>
            </table>
            <p>{{ $agences->links()}}</p>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
@include('admin.agence.create')
@endsection
@extends('partial.app')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <div class="table-head ">
                    <h4><i class="fa fa-angle-right"></i>Poste</h4>
                    <a class="btn btn-info " data-toggle="modal" data-target="#ModalAddPoste" href="#">Ajouter un poste</a>
                </div>
                <hr>
                <thead>
                    <tr>
                        <th><i class=""></i> N°</th>
                        <th class=""><i class=""></i> Code</th>
                        <th class=""><i class=""></i> Nom</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($postes->count() > 0 )
                    @foreach ($postes as $poste)
                    <tr>
                        <td>{{++$i}}</td>
                        <td class="">{{$poste->code}}</td>
                        <td class="">{{$poste->nom}}</td>
                        <td>
                            <button class="btn btn-info btn-xs" title="Supprimer" data-toggle="modal" data-target="#ModalEdit{{$poste->id}}"><i class="fa fa-edit "></i></button>
                            <button class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal" data-target="#ModalDelete{{$poste->id}}"><i class="fa fa-trash-o "></i></button>
                        </td>
                    </tr>
                    @include('admin.poste.delete')
                    @include('admin.poste.edit')
                    @endforeach
                    @else
                    <td colspan="3">Aucun poste enrégistré</td>
                    @endif

                </tbody>
            </table>
            <p>{{ $postes->links()}}</p>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
@include('admin.poste.create')
@endsection

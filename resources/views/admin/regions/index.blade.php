@extends('partial.app')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <div class="table-head ">
                <h4><i class="fa fa-angle-right"></i>Région</h4>
                <div class="ajout">
                    <a class="btn btn-info" data-toggle="modal" id="ajoutzone" data-target="#ModalAddRegion" href="#">Ajouter une région</a>
                    <a class="btn btn-info " data-toggle="modal" id="ajoutzone" data-target="#ModalAddagence" href="#">Ajouter une agence</a>

                </div>

            </div>
            @forelse ($regions as $region)
            <!--  <button>{{$region->nom_region}}</button> -->
            <div class="accordion">



                <div class="table-head ">
                    <div class="region">
                        <span class="span">{{$region->code_region}}</span>
                        <p style="padding: 10px;">{{$region->nom_region}}</p>

                    </div>
                    <div>
                        <button class="btn btn-info btn-xs" title="Supprimer" data-toggle="modal" data-target="#ModalEdit{{$region->id}}"><i class="fa fa-edit "></i></button>
                        <button class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal" data-target="#ModalDelete{{$region->id}}"><i class="fa fa-trash-o "></i></button>

                    </div>
                </div>
            </div>
            <div class="panel">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="" aria-hidden="true"></i>Code Agence</th>
                            <th><i class="" aria-hidden="true"></i> Nom</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($region->agences as $agence)
                        <tr>

                            <td>
                                {{$agence->code_agence}}
                            </td>
                            <td class="">{{$agence->nom_agence}}</td>

                            <td>
                                <button class="btn btn-info btn-xs" title="Modifier" data-toggle="modal" data-target="#ModalEditAgence{{$agence->id}}"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal" data-target="#ModalDeleteAgence{{$agence->id}}"><i class="fa fa-trash-o "></i></button>
                            </td>
                            @include('admin.agence.delete')
                            @include('admin.agence.edit')
                        </tr>

                        @empty
                        <td colspan="3"> Auncune agence enrégistrée</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @include('admin.regions.delete')
            @include('admin.regions.edit')
           
            @empty
            <td>Aucune region enrégistrée</td>
            @endforelse
            {{$regions->links()}}

        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
@include('admin.agence.create')
@include('admin.regions.create')
@endsection

@extends('partial.app')
@section('content')


<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <div class="tableBtn">
                <h4><i class="fa fa-angle-right"></i>Frais Client</h4>

               <!--  <form action="{{ route('import')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="btnExport">

                        @if (Auth::user()->role == 1 || Auth::user()->role == 3)

                        <input class="form-control" type="file" name="fichier" id="">
                        <button style="margin-left:10px;" class="btn btn-success" type="submit" name="importation"><i class="fa-sharp fa-solid fa-file-excel"></i>Excel</button>
                        @endif
                    </div>
                </form> -->

            </div>
            @for ($i = 2021; $i<= date('Y'); $i++) <div class="accordion">
                {{$i}}
        </div>
        <div class="panel">
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th><i class="" aria-hidden="true"></i>Agence</th>
                        <th><i class="" aria-hidden="true"></i>Frais de dossier de crédits</th>
                        <th><i class="" aria-hidden="true"></i>Commissions sur tontine</th>
                        <th><i class="" aria-hidden="true"></i>Frais de tenue de comptes </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($fraisClients->where('annee',$i) as $fraisClient)

                    <tr>
                        <td class="">{{$fraisClient->fraitClient->nom_agence}}</td>
                        <td>{{$fraisClient->frais_dossier_credits}} </td>
                        <td class="">{{$fraisClient->commissions_tontine}}</td>
                        <td class="">{{$fraisClient->frais_tenu_compte}}</td>

                        <td>
                            <a class="btn btn-danger btn-xs" title="Détaille" data-toggle="modal" href="{{ route('fraisClient.show',$fraisClient->id)}}"><i class="fa fa-eye"></i></a>
                            @if (Auth::user()->role == 1)
                            <a class="btn btn-info btn-xs" title="Modifier" href="{{ route('fraisClient.edit',$fraisClient->id)}}"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal" data-target="#ModalDeletefraisClient{{$fraisClient->id}}"><i class="fa fa-trash-o "></i></button>
                        </td>
                        @include('admin.frais_client.delete')
                        @endif

                    </tr>

                    @empty
                    <td colspan="3"> Auncun frais client enrégistrée</td>

                    @endforelse
                </tbody>
                <p>{{$fraisClients->links()}}</p>
            </table>
        </div>

        @endfor

    </div>
    <!-- /content-panel -->
</div>
<!-- /col-md-12 -->
</div>

@endsection

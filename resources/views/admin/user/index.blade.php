@extends('partial.app')
@section('content')

<div class="row mt">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-advance table-hover">
                <div class="table-head ">
                    <h4><i class="fa fa-angle-right"></i>Utilisateurs</h4>
                </div>
                <hr>
                <thead>
                    <tr>
                        <th class=""><i class=""></i> Nom</th>
                        <th class=""><i class=""></i> Prénom</th>
                        <th class=""><i class=""></i> E-mail</th>
                        <th class=""><i class=""></i> Agence</th>
                        <th class=""><i class=""></i> Role</th>
                        <th class=""><i class=""></i> Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() > 0 )
                    @foreach ($users as $user)
                    <tr>
                        <td class="">{{$user->nom}}</td>
                        <td class="">{{$user->prenom}}</td>
                        <td class="">{{$user->email}}</td>
                        @if ($user->agence)
                        <td class=""> {{$user->agence->nom_agence}} </td>
                        @endif


                        <td class="">
                            @if ($user->role == 0)
                            Direction
                            @elseif ($user->role == 1)
                            Administrateur
                            @elseif ($user->role == 2)
                            Agence
                            @elseif ($user->role == 3)
                            Controleur
                            @endif
                        </td>
                        <td>
                            @if ($user->active == 1)
                               Active
                            @elseif ($user->active == 0)
                                Bloqué
                            @endif




                        </td>
                        <td>
                            <a class="btn btn-info btn-xs" title="Modifier" href="{{ route('user.edit',$user->id)}}"><i class="fa fa-edit "></i></a>
                            <button class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal" data-target="#ModalDeleteUser{{$user->id}}"><i class="fa fa-trash-o "></i></button>
                            @if ($user->active == 1)

                            <a class="btn btn-success btn-xs" title="Bloquer" data-toggle="modal" data-target="#ModalStatUser{{$user->id}}" href=""><i class="fa fa-check-square-o "></i></a>
                            @else

                            <a class="btn btn-primary btn-xs" title="Débloquer" data-toggle="modal" data-target="#ModalStatUser{{$user->id}}" href=""><i class="fa fa-close"></i></a>
                            @endif

                        </td>
                    </tr>
                    @include('admin.user.delete')
                    @include('admin.user.status')
                    @endforeach
                    @else
                    <td colspan="3">Aucune user enrégistrée</td>
                    @endif

                </tbody>
            </table>
            <p>{{ $users->links()}}</p>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
@endsection

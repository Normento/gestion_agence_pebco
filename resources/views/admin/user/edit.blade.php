@extends('partial.app')
@section('content')
<h3><i class="fa fa-angle-right"></i> Utilisateur</h3>
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Utilisateur</h4>
            <form action="{{ route('user.update',$user->id)}}" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nom </label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" class="form-control" value="{{ $user->nom}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Prénom</label>
                    <div class="col-sm-10">
                        <input type="text" name="prenom" class="form-control" value="{{ $user->prenom}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" value="{{ $user->email}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="role" id="">
                            <option value="">Veillez choisir un status</option>
                            <option value="0">Direction</option>
                            <option value="1">Administrateur</option>
                            <option value="2">Agence</option>
                            <option value="3">Controleur</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Agence</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="code_agence" id="">
                        <option value="">Veillez choisir une agence</option>
                            @foreach ($agences as $agence)
                            <option value="{{$agence->code_agence}}">{{$agence->nom_agence}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-send">
                    <button type="submit" class="btn btn-large btn-info">Modifier</button>
                </div>
            </form>
        </div>
    </div>
    <!-- col-lg-12-->
</div>

@endsection

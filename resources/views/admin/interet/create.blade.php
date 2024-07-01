@extends('partial.app')
@section('content')
<h3><i class="fa fa-angle-right"></i> Intérêt</h3>
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Intérêt</h4>
            <form action="{{ route('interet.store')}}" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Agence</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="code_agence" id="">
                        <option value="">Veuillez choisir une agence</option>
                            @foreach ($agences as $agence)

                            <option value="{{$agence->code_agence}}">{{$agence->nom_agence}}</option>
                            @endforeach
                        </select>
                        @error('agence')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Année</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="annee" id="">
                        <option value="">Veuillez choisir une année</option>
                            @for ($i = 2021; $i<= date('Y'); $i++)
                             <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>
                        @error('annee')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Intérêts reçus sur opérations avec la clientèle </label>
                    <div class="col-sm-10">
                        <input type="number" name="interet_recu_operation_client" class="form-control">
                        @error('interet_recu_operation_client')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">intérêts reçus sur opérations avec les tiers</label>
                    <div class="col-sm-10">
                        <input type="number" name="interet_recus_operation_tiers" class="form-control">
                        @error('interet_recus_operation_tiers')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Intérêts versés sur opérations avec la clientèle</label>
                    <div class="col-sm-10">
                        <input type="number" name="interet_verse_operation_client" class="form-control">
                        @error('interet_verse_operation_client')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">intérêts versés sur opérations avec les tiers </label>
                    <div class="col-sm-10">
                        <input type="number" name="interet_verse_operation_tiers" class="form-control">
                        @error('interet_verse_operation_tiers')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Coût du risque net</label>
                    <div class="col-sm-10">
                        <input type="number" name="cout_risque_net" class="form-control">
                        @error('cout_risque_net')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-send">
                    <button type="submit" class="btn btn-large btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    <!-- col-lg-12-->
</div>

@endsection

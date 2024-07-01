@extends('partial.app')
@section('content')
<h3><i class="fa fa-angle-right"></i> Intérêt</h3>
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Intérêt</h4>
            <form action="{{ route('interet.update',$interet->id)}}" class="form-horizontal style-form" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Intérêts reçus sur opérations avec la clientèle
                    </label>
                    <div class="col-sm-10">
                        <input type="number" name="interet_recu_operation_client" class="form-control"
                            value="{{ $interet->interet_recu_operation_client}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">intérêts reçus sur opérations avec les tiers</label>
                    <div class="col-sm-10">
                        <input type="number" name="interet_recus_operation_tiers" class="form-control"
                            value="{{ $interet->interet_recus_operation_tiers}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Intérêts versés sur opérations avec la
                        clientèle</label>
                    <div class="col-sm-10">
                        <input type="number" name="interet_verse_operation_client" class="form-control"
                            value="{{ $interet->interet_verse_operation_client}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">intérêts versés sur opérations avec les tiers
                    </label>
                    <div class="col-sm-10">
                        <input type="number" name="interet_verse_operation_tiers" class="form-control"
                            value="{{ $interet->interet_verse_operation_tiers}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Coût du risque net</label>
                    <div class="col-sm-10">
                        <input type="number" name="cout_risque_net" class="form-control"
                            value="{{ $interet->cout_risque_net}}">
                    </div>
                </div>

                <div class="form-send">
                    <button type="submit" class="btn btn-large btn-primary">Enrégistrer</button>
                </div>
            </form>
        </div>
    </div>
    <!-- col-lg-12-->
</div>

@endsection

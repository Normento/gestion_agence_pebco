@extends('partial.app')
@section('content')


<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <div class="tableBtn">
                <h4><i class="fa fa-angle-right"></i>Intérèts</h4>

                <form action="{{ route('exportation')}}" method="POST">
                    @csrf
                    <div class="btnExport">
                    <select name="annee" id="" class="form-control " style="margin-right:10px ;">
                            <option value="">veuillez choisir une année</option>
                            @for ($i=2021; $i<= date('Y'); $i++)


                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        @if (Auth::user()->role == 1 || Auth::user()->role == 0)

                        <select name="agence" id="" class="form-control" style="margin-right:10px ;">
                            <option value="">veuillez choisir une agence</option>
                            @foreach ($agences as $agenc)
                            <option value="{{$agenc->code_agence}}">{{$agenc->nom_agence}}</option>
                            @endforeach
                        </select>
                        @else
                        <input type="hidden" name="agence" value="{{Auth::user()->code_agence}}" id="">
                        @endif

                        <button style="margin-right:10px;"   class="btn btn-danger" value="pdf" type="submit" name="exportation"> <i class="fas fa-file-pdf"></i> Pdf</button>
                        <button style="margin-right:10px;" class="btn btn-success" value="excel" type="submit" name="exportation"><i class="fa-sharp fa-solid fa-file-excel"></i>Excel</button>
                    </div>
                </form>

            </div>
            @for ($i = 2021; $i<= date('Y'); $i++) <div class="accordion">
                {{$i}}
        </div>
        <div class="panel">
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th><i class="" aria-hidden="true"></i>Agence</th>
                        <th><i class="" aria-hidden="true"></i>Intérêts reçus sur opérations avec la clientèle</th>
                        <th><i class="" aria-hidden="true"></i>Intérêts reçus sur opérations avec les tiers</th>
                        <th><i class="" aria-hidden="true"></i>Intérêts versés sur opérations avec la clientèle</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($interets->where('annee',$i) as $interet)

                    <tr>
                        <td class="">{{$interet->agence->nom_agence}}</td>
                        <td>{{$interet->interet_recu_operation_client}} </td>
                        <td class="">{{$interet->interet_recus_operation_tiers}}</td>
                        <td class="">{{$interet->interet_verse_operation_client}}</td>
                        <td>
                            <a class="btn btn-danger btn-xs" title="Détaille" data-toggle="modal" href="{{ route('interet.show',$interet->id)}}"><i class="fa fa-eye"></i></a>
                            @if (Auth::user()->role == 1)
                            <a class="btn btn-info btn-xs" title="Modifier" href="{{ route('interet.edit',$interet->id)}}"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger btn-xs" title="Supprimer" data-toggle="modal" data-target="#ModalDeleteinteret{{$interet->id}}"><i class="fa fa-trash-o "></i></button>
                        </td>
                        @include('admin.interet.delete')
                        @endif

                    </tr>

                    @empty
                    <td colspan="3"> Auncun intérêt enrégistrée</td>

                    @endforelse
                </tbody>
                <p>{{$interets->links()}}</p>
            </table>
        </div>

        @endfor

    </div>
    <!-- /content-panel -->
</div>
<!-- /col-md-12 -->
</div>
@endsection

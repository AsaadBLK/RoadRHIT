@extends('layouts.app')


@section('content')

	<div class="table-title">
	<div class="row">
	<div class="col-sm-6">
	    <br>
	<h2 class="modal-title">Modifier le materiel</h2>
	</div>
	<div class="col-sm-6">
    <br><br>
	<a href="{{ route('materiel.index') }}" class="btn btn-info"><span class="material-icons">arrow_circle_left</span><span>Retour</span></a>
	 </div>
	</div>
	</div>

<div class="row">
<div class="col-md-12">
<!-- validation -->
@if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
@endif
<!-- validation -->

<form id="{{$materiel->id}}" action="{{route('materiel.delete', $materiel->id)}}" method="post">
 @csrf
 @method('delete')
 </form>
 @if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 4)
 <i style="cursor: pointer; color:red" class="material-icons float-right "  onclick="event.preventDefault(); if(confirm('étes vous sur ?')) document.getElementById({{$materiel->id}}).submit();" title="Supprimer">&#xE872;</i>
@endif
<br>


   <form method="post" action="{{ route('materiel.update',$materiel->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
	<div class="form-group">
	<label>Désignation</label>
	<input type="text" name="designation" value="{{ $materiel->designation }}" class="form-control" required>
	</div>
	<div class="form-group">
	<label>Marque</label>
	<input type="text" name="marque" value="{{ $materiel->marque }}" class="form-control" required>
	</div>
	<div class="form-group">
	<label>Model</label>
	<input type="text" name="modell" value="{{ $materiel->modell }}" class="form-control" required>
	</div>
    <div class="form-group">
	<label>S/N</label>
	<input type="text" name="serialnumber" value="{{ $materiel->serialnumber }}" class="form-control" required>
	</div>
	<div class="form-group">
	<label>Status : {{ $materiel->status }} </option></label> <br>
	<select name="status" class="select">
    <option value="---">---</option>
	<option value="Disponible">Disponible</option>
	<option value="Déjà attribué">Déjà attribué</option>
	<option value="KO">KO</option>
	</select>
	</div>
	<div class="form-group">
	<label>Etat : {{ $materiel->etat }}</option></label> <br>
	<select name="etat" class="select">
    <option value="---">---</option>
	<option value="NEUF">NEUF</option>
	<option value="OPERATIONNEL">OPERATIONNEL</option>
	</select>


	</div>
	<div class="form-group">
	<label>Commentaire</label>
	<textarea class="form-control" name="commentaire" required>{{ $materiel->commentaire }}</textarea>
	</div>

 @if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 4)
<div class="float-right">



<div class="col-xs-12">
 <div class="text-right">
    <button type="submit" class="btn btn-info">Modifier</button>
 <br>
</div>
</div>

</div>
</div>

</form>
 </div>
@endif




 @endsection

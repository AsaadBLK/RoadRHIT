@extends('layouts.app')


@section('content')

	<div class="table-title">
	<div class="row">
	<div class="col-sm-6">
	    <br>
	<h2 class="modal-title">Ajouter un materiel</h2>
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

	<form method="post" action="{{ route('materiel.store') }}" enctype="multipart/form-data">
        @csrf
	<div class="form-group">
	<label>Désignation</label>
	<input type="text" name="designation" class="form-control" required>
	</div>
	<div class="form-group">
	<label>Marque</label>
	<input type="text" name="marque" class="form-control" required>
	</div>
	<div class="form-group">
	<label>Model</label>
	<input type="text" name="modell" class="form-control" required>
	</div>
    <div class="form-group">
	<label>S/N</label>
	<input type="text" name="serialnumber" class="form-control" required>
	</div>
	<div class="form-group">
	<label>Status</label> <br>
	<select name="status" class="form-control select">
    <option value="none">---</option>
	<option value="Disponible">Disponible</option>
	<option value="Déjà attribué">Déjà attribué</option>
	<option value="KO">KO</option>
	</select>
	</div>
	<div class="form-group">
	<label>Etat</label> <br>
	<select name="etat" class="form-control select">
    <option value="none">---</option>
	<option value="NEUF">NEUF</option>
	<option value="OPERATIONNEL">OPERATIONNEL</option>
	</select>
	</div>
	<div class="form-group">
	<label>Commentaire</label>
	<textarea class="form-control" name="commentaire" required></textarea>
	</div>

	<input style="width:150px;" type="submit" class="btn btn-success" value="Ajouter">

	</form>

	</div>
</div>





 @endsection

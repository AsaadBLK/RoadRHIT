@extends('layouts.app')


@section('content')

	<div class="table-title">
	<div class="row">
	<div class="col-sm-6">
	    <br>
	<h2 class="modal-title">Gestion materiels</h2>
	</div>
	<div class="col-sm-6">
    <br><br>
	<a href="{{ route('materiel.create') }}" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Ajouter</span></a>
	 </div>
	</div>
	</div>


     <!-- flash message -->
    @if (session()->has('success'))
    <div class="alert alert-success">
    {{ session()->get('success') }}
    </div>
    @endif
    <!-- flash message -->


	<div class="row">
	<table class="table table-striped table-hover">
	<thead>
	<tr>
	<th>
	<span class="custom-text">
	<label for="selectAll"> </label>
	</span>
	</th>
    <th scope="col">Désignation</th>
	<th scope="col">Marque</th>
	<th scope="col">Model</th>
	<th scope="col">Serial Number</th>
	<th scope="col">Status</th>
	<th scope="col">Etat</th>
	<th scope="col">Commentaire</th>
	<th scope="col">Actions</th>
	</tr>
	</thead>
	<tbody>


 @forelse($materiels as $materiel)
 <tr>
	<td>
	<span class="custom-text">
	<label for="checkbox2"></label>
	</span>
	</td>
 <td scope="row">{{ $materiel->designation }}</td>
 <td scope="row">{{ $materiel->marque }}</td>
 <td scope="row">{{ $materiel->modell }}</td>
 <td scope="row">{{ $materiel->serialnumber }}</td>
 <td scope="row">{{ $materiel->etat }}</td>
 <td scope="row">{{ $materiel->status }}</td>
 <td scope="row">{{ $materiel->commentaire }}</td>
<td scope="row">


<form id="{{$materiel->id}}" action="{{route('materiel.delete', $materiel->id)}}" method="post">
 @csrf
 @method('delete')
 </form>

 <a href="{{ route('materiel.show', ucfirst($materiel->id)) }}" class="edit"><span style="cursor: pointer; color:rgb(41, 56, 99)"  class="material-icons">preview</span></a>
<i style="cursor: pointer; color:red" class="material-icons float-right "  onclick="event.preventDefault(); if(confirm('étes vous sur ?')) document.getElementById({{$materiel->id}}).submit();" title="Supprimer">&#xE872;</i>
 </td>
 </tr>

 @empty
 <td class="text-warning">Aucun materiels disponible</td>
 @endforelse




	</tbody>
	</table>

	</div>

<div class="float-right">
<div class="d-flex justify-content-right m-n8">
	{{ $materiels->links() }}
	</div>
</div>






 @endsection

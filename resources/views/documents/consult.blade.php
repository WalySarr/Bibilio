@extends('layout.layout')
@section('titre', 'Consultation du document '.$doc->titre)
@section('content')
    <div class="card" style="width: 18rem;">
  <img src="https://placehold.co/400" class="card-img-top" alt="image du document {{$doc->titre}}">
  <div class="card-body">
    <h5 class="card-title">{{$doc ->titre}}</h5>
    <p class="card-text">{{$doc ->description}}</p>
    <a href="{{ route('documents.show')}}" class="btn btn-primary">Liste des Documents</a>
  </div>
</div>
@endsection
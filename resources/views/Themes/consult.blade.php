@extends('layout.layout')
@section('titre', "Consultation $theme->theme")
@section('content')
    <div class="card text-bg-success mb-3 mx-auto" style="max-width: 18rem;">
        <div class="card-header">Thèmes</div>
        <div class="card-body">
            <h5 class="card-title">{{$theme->theme}}</h5>
            <p class="card-text">{{$theme->niveau}}</p>
        </div>
    </div>
@endsection

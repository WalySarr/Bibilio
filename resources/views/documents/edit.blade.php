@extends('layout.layout')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.all.min.js"></script>
@section('titre', 'Ajouter un nouveau Document')
@section('content')
    <form class="update-form" action="{{route('documents.update', [ 'id' => $doc->id ])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if (session('updateSuccess'))
        @endif
        <div class="my-2">
            <label for="" class="label-form text-light">Titre</label>
            <input type="text" class="form-control" placeholder="Saisir le Titre" name="titre" value="{{$doc->titre}}">
        </div>
        <div class="my-2">
            <input type="file" name="chemin" id="" class="form-control" value="{{$doc->chemin}}">
            <label for="" class="label-form text-light">Image</label>
        </div>
        <div class="my-2 form-floating">
            <textarea name="description" id="floatingTextArea" class="form-control" placeholder="Laissez un commentaire">{{$doc->description}}</textarea>
            <label for="floatingTextArea" class="label-form">Description</label>
        </div>
        <div class="my-2">
            <label for="" class="label-form text-light">Theme</label>
            <input type="text" class="form-control" placeholder="Saisir le Titre" name="theme_id" value="{{$doc->theme_id}}">
        </div>
        <div class="my-2">
            <button class="btn-sm btn btn-primary" onclick="updateFormConfirmation()">Editer</button>
        </div>
    </form>

@endsection

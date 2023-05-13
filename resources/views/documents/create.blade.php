@extends('layout.layout')
@section('titre', 'Ajouter un nouveau Theme')
@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        <div class="my-2">
            <label for="" class="label-form">Titre</label>
            <input type="text" class="form-control" placeholder="Saisir le Titre" name="titre">
        </div>
        <div class="my-2">
            <input type="file" name="chemin" id="" class="form-control">
            <label for="" class="label-form text-light">Image</label>
        </div>
        <div class="my-2 form-floating">
            <textarea name="description" id="floatingTextArea" class="form-control" placeholder="Laissez un commentaire"></textarea>
            <label for="floatingTextArea" class="label-form">Description</label>
        </div>
        <div class="my-2">
            <button class="btn-sm btn btn-primary">Envoyer</button>
        </div>
    </form>

@endsection

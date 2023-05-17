@extends('layout.layout')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.all.min.js"></script>
@section('titre', 'Ajouter un nouveau Document')
@section('content')
    <form action="{{ route('documents.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (session('addSuccess'))
            <script>
                Swal.fire(
                    'Document Ajouté',
                    '{{ session('addSuccess') }}',
                    'success'
                )
            </script>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
            <label for="" class="label-form">Theme</label>
            <select name="theme_id" id="theme_id" class="form-select">
                @foreach ($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->theme }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-2">
            <button class="btn-sm btn btn-primary">Envoyer</button>
        </div>
    </form>

@endsection

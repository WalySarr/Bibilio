@extends('layout.layout')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.all.min.js"></script>
@section('titre')
    Liste des Documents
@endsection
@section('content')
@section('supply')
    <div class="row gx-0">
        <div class="col-md-10 d-flex justify-content-end">
            <a class="btn btn-dark p-2 mx-5 mb-3" href="{{ route('documents.add') }}">Ajouter Nouveau Document</a>
        </div>
    </div>
@endsection
    @if (session('deleteSuccess'))
        <script>
            swal.fire("Document supprimé !", "{{ session('deleteSuccess') }}", "success");
        </script>
    @endif
    @if (session('updateSuccess'))
    <script>
        Swal.fire(
            'Document Modifié',
            '{{ session('updateSuccess') }}',
            'success'
        )
    </script>  
    @endif
    <table class="table table-stripped table-hover my-1 text-light" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du Documents</th>
                <th scope="col">Titre</th>
                <th scope="col">Theme</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($docs as $doc)
                <tr>
                    <td scope='row'>{{ $doc->id }}</td>
                    <td>{{ $doc->titre }}</td>
                    <td>{{ $doc->description }}</td>
                    <td>{{ $doc->theme_id }}</td>
                    <td></td>
                    <td>
                        <a href="{{ route('documents.consult', ['id' => $doc->id]) }}" class="btn btn-outline-primary">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <form action="{{ route('documents.delete', ['id' => $doc->id]) }}" method="post"
                            class="delete-form d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="deleteFormConfirmation()"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                        <a href="{{ route('documents.edit', ['id' => $doc->id]) }}" class="btn btn-outline-warning"><i
                                class="bi bi-pen"></i></a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Initialisation de la table jQuery DataTables
            $('#myTable').DataTable({
                language: {
                    paginate: {
                        first: "Premier", // Bouton pour aller à la première page
                        last: "Dernier", // Bouton pour aller à la dernière page
                        next: "Suivant", // Bouton pour aller à la page suivante
                        previous: "Précédent" // Bouton pour aller à la page précédente
                    },
                    search: 'Rechercher' // Personnalisation du texte "Search"
                }
            });
        });
    </script>
@endsection

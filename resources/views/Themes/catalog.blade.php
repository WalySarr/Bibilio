@extends('layout.layout')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.all.min.js"></script>
@section('titre')
    Liste de tous les Thèmes
@endsection
@section('supply')
    <div class="row gx-0">
        <div class="col-md-10 d-flex justify-content-end">
            <a class="btn btn-dark p-2 mx-5 mb-3" href="{{ url('themes') }}">Ajouter Nouveau Theme</a>
        </div>
    </div>
@endsection

@section('content')
    @if (session('updateSuccess'))
        <script>
            Swal.fire(
                'Thème Modifié',
                '{{ session('updateSuccess') }}',
                'success'
            )
        </script>
    @endif
    <table class="table table-stripped table-hover my-1 rounded text-light" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du Thème</th>
                <th scope="col">Niveau</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($themes as $theme)
                <tr>
                    <td scope='row'>{{ $theme->id }}</td>
                    <td>{{ $theme->theme }}</td>
                    <td>{{ $theme->niveau }}</td>
                    <td>
                        <a href="{{ url("consult/$theme->id") }}" class="btn btn-outline-primary">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <form class="delete-form d-inline" action="{{ url("themes/$theme->id") }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="deleteFormConfirmation()"><i
                                    class="bi bi-trash-fill"></i></button>
                        </form>
                        <a href="{{ route('edit', ['id' => $theme->id]) }}" class="btn btn-outline-warning"><i
                                class="bi bi-pen"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
@endsection

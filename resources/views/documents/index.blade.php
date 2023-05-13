@extends('layout.layout')
@section('titre')
    Liste des Documents
@endsection
@section('content')

    <table class="table table-stripped table-hover my-1 text-center text-light" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du Thème</th>
                <th scope="col">Niveau</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope='row'>1</td>
                <td>test</td>
                <td>test</td>
                <td>
                    <a href="" class="btn btn-outline-primary">
                        <i class="bi bi-eye-fill"></i>
                    </a>

                </td>
            </tr>
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

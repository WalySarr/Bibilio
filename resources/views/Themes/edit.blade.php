@extends('layout.layout')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.all.min.js"></script>
@section('titre')
    Edition du Theme
@endsection
@section('content')
    <form action="{{ route('update', ['id' => $theme->id]) }}" method="post">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Les erreurs suivantes ont été rencontrées :',
                    html: '@foreach ($errors->all() as $error) <p>{{ $error }}</p> @endforeach',
                });
            </script>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="my-2">
            <input type="text" placeholder="Nom du Theme" class="form-control" name="theme" value="{{ $theme->theme }}">
        </div>
        <div class="my-3">
            <input type="text" placeholder="Niveau du Theme" class="form-control" name="niveau"
                value="{{ old('niveau') }}">
        </div>
        <div class="my-3">
            <button class="btn btn-outline-success">Editer</button>
        </div>
    </form>
@endsection

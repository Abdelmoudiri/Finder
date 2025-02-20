@extends('layouts')
@section('title','Ajouter Annonce')
@section('content')
hhhhhhhhhhh
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter une annonce</h1>
        <form action="{{ route('addAnnonce.post') }}" method="POST">
            @csrf <!-- Token de sécurité Laravel -->
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="lieu">Lieu</label>
                <input type="text" class="form-control" id="lieu" name="lieu" required>
            </div>
            <div class="form-group">
                <label for="type">Type d'annonce</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="perdu">Perdu</option>
                    <option value="trouvé">Trouvé</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Publier l'annonce</button>
        </form>
    </div>
<!-- Bootstrap JS and dependencies -->
@endsection

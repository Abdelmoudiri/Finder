@extends('layouts')
@section('title','Profile')
@section('content')


<h1>Bienvenue, {{ Auth::user()->name }} !</h1>

<a href="{{ route('logout') }}">Déconnexion</a>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Profil de {{ Auth::user()->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 text-center">
                            <img src="{{ Auth::user()->name }}" alt="Photo de profil" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                        </div>
                        <div class="col-md-8">
                            <h5 class="mb-3">Informations personnelles</h5>
                            <p><strong>Nom:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p><strong>Date d'inscription:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                            <a href="" class="btn btn-warning">Modifier le profil</a>
                        </div>
                    </div>

                    <h5 class="mt-4">Paramètres</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="">Changer le mot de passe</a>
                        </li>
                        <li class="list-group-item">
                            <a href="">Gérer les notifications</a>
                        </li>
                        <li class="list-group-item">
                            <a href="" class="text-danger">Supprimer le compte</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

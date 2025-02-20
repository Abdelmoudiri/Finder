<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function index(){
        return view('annonce');
    }
    public function addAnnonce()
    {
        return view('ajouter_Annonce');

    }
    // app/Http/Controllers/AnnonceController.php
namespace App\Http\Controllers;

    use App\Models\Annonce;
    use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    // Afficher le formulaire de création d'annonce
    public function create()
    {
        return view('annonces.create');
    }

    // Enregistrer une nouvelle annonce
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'lieu' => 'required|string|max:255',
            'type' => 'required|in:perdu,trouvé', // Le type doit être "perdu" ou "trouvé"
        ]);

        // Créer une nouvelle annonce
        Annonce::create($request->all());

        // Rediriger vers la page d'accueil avec un message de succès
        return redirect()->route('home')->with('success', 'Annonce publiée avec succès !');
    }

    //
}

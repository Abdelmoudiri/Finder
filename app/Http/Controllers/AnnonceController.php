<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    public function index(){
        $annonces = Annonce::all();
        return view('home', compact('annonces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'lieu' => 'required|string|max:255',
            'type' => 'required|in:perdu,trouvé', // Le type doit être "perdu" ou "trouvé"
        ]);

        // Créer une nouvelle annonce
        Annonce::create([
            'titre'=> $request->input('titre'),
            'description'=> $request->input('description'),
            'date'=> $request->input('date'),
            'lieu'=> $request->input('lieu')
        ]);

        // Rediriger vers la page d'accueil avec un message de succès
        return redirect()->route('home')->with('success', 'Annonce publiée avec succès !');
    }

}

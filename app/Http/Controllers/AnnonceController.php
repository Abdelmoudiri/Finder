<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    public function index(){
        $annonces = Annonce::all();
        return view('welcome', compact('annonces'));
    }
    
    public function addPage(){
        return view('annonce');
    }

    public function getAnnonce(Annonce $annonce){
        return view('Annonce_Details', compact('annonce'));
    }
  

    public function store(Request $request)
    { 
        // dd($request->all());
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'lieu' => 'required|string|max:255',
            'type' => 'required', 
        ]);
       

        Annonce::create([
            'titre'=> $request->input('titre'),
            'description'=> $request->input('description'),
            'date'=> $request->input('date'),
            'lieu'=> $request->input('lieu'),
            'type'=> $request->input('type'),
            'user_id'=> Auth::id(),
           
        ]);

        return redirect()->route('getAnnonce')->with('success', 'Annonce publiée avec succès !');
    }

}

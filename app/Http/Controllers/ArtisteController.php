<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
    //--- Méthode pour récupérer tous les artistes ---//
    public function artistes()
    {
        // On récupère tous les artistes
        $artistes = Artiste::all();

        // On retourne les artistes au format JSON
        return response()->json($artistes);
    }


    //--- Méthode pour récupérer un artiste selon son ID ---//
    public function artiste($artisteId)
    {
        // On récupère l'artiste à partir de son ID
        $artiste = Artiste::where('id', $artisteId)->first();

        // On retourne le's 'artiste au format JSON
        return response()->json($artiste);
    }
}

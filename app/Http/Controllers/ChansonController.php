<?php

namespace App\Http\Controllers;

use App\Models\Chanson;
use Illuminate\Http\Request;

class ChansonController extends Controller
{
    //--- Méthode pour récupérer tous les chansons ---//
    public function chansons()
    {
        // On récupère tous les chansons
        $chansons = Chanson::all();

        // On retourne les chansons au format JSON
        return response()->json($chansons);
    }


    //--- Méthode pour récupérer un chanson selon son ID ---//
    public function chanson($chansonId)
    {
        // On récupère la chanson à partir de son ID
        $chanson = Chanson::where('id', $chansonId)->first();

        // On retourne la chanson au format JSON
        return response()->json($chanson);
    }


    //--- Méthode pour récupérer toutes les chansons d'un artiste en particulier selon son ID ---//
    public function chansonsArtiste($artisteId)
    {
        // On récupère les chansons de l'artiste
        $chansons = Chanson::where('artiste_id', $artisteId)->get();

        // On retourne les chansons au format JSON
        return response()->json($chansons);
    }


    //--- Méthode pour augmenter le nombre de lectures d'une chanson ---//
    public function augmenterLecture($chansonId)
    {
        // On cherche la chanson a partir de son ID
        $chanson = Chanson::find($chansonId);

        // Si la chanson existe
        if ($chanson) {
            // On augmente le nombre de lectures
            $chanson->lectures++;

            // On sauvegarde la chanson
            $chanson->save();

            // On retourne un message de confirmation
            return response()->json(['message' => 'Lecture augmentée']);
        }
    }
}

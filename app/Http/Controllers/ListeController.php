<?php

namespace App\Http\Controllers;

use App\Models\Liste;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class ListeController extends Controller
{
    //--- Méthode pour récupérer toutes les listes publiques ---//
    public function listesPubliques()
    {
        $listes = Liste::where('visibilite', 'publique')->get();
        return response()->json($listes);
    }


    //--- Méthode pour récupérer une liste selon son ID ---//
    public function liste($listeId)
    {
        $liste = Liste::where('id', $listeId)->get();
        return response()->json($liste);
    }


    //--- Méthode pour récupérer les listes d'un utilisateur en particulier selon son ID ---//
    public function listesUtilisateur($utilisateurId)
    {
        // On cherche l'Utilisateur à partir de son ID
        $utilisateur = Utilisateur::find($utilisateurId);

        // On cherche les listes de l'Utilisateur
        $listes = $utilisateur->listes;

        // On retourne les listes au format JSON
        return response()->json($listes);
    }


    //--- Méthode pour créer une nouvelle liste ---//
    public function creerListe(Request $request)
    {
        // On valide les données de la requête
        $donnees = $request->validate([
            'titre' => 'required|string', // La titre est obligatoire et doit être composé d'une chaîne de caractères
            'type' => 'required|string', // Le type est obligatoire et doit être composé d'une chaîne de caractères
            'soustitre' => 'nullable|string', // Le soustitre est facultatif et doit être composé d'une chaîne de caractères
            'image' => 'nullable|string', // L'image est facultatif et doit être composé d'une chaîne de caractères
            'description' => 'nullable|string', // La description est facultative et doit être composé d'une chaîne de caractères
            'verifie' => 'nullable|integer', // La verifie est facultative et doit être un nombre
            'visibilite' => 'nullable|string', // La visibilite est facultative et doit être composé d'une chaîne de caractères
            'sauvegardes' => 'nullable|integer', // La sauvegardes est facultative et doit être un nombre
        ]);

        // On crée la nouvelle liste en utilisant les données validées
        $liste = Liste::create([
            'titre' => $donnees['titre'],
            'type' => $donnees['type'],
            'soustitre' => $donnees['soustitre'] ?? null,
            'image' => $donnees['image'] ?? null,
            'description' => $donnees['description'] ?? null,
            'verifie' => $donnees['verifie'] ?? 0,
            'visibilite' => $donnees['visibilite'] ?? 'privée',
            'sauvegardes' => $donnees['sauvegardes'] ?? 0,
        ]);

        // On retourne la nouvelle liste au format JSON
        return response()->json($liste, 201);
    }


    //--- Méthode pour modifier une liste ---//
    public function modifierListe(Request $request, $listeId)
    {
        $liste = Liste::find($listeId);

        // On valide les données de la requête
        $donnees = $request->validate([
            'titre' => 'required|string', // La titre est obligatoire et doit être composé d'une chaîne de caractères
            'type' => 'required|string', // Le type est obligatoire et doit être composé d'une chaîne de caractères
            'soustitre' => 'nullable|string', // Le soustitre est facultatif et doit être composé d'une chaîne de caractères
            'image' => 'nullable|string', // L'image est facultatif et doit être composé d'une chaîne de caractères
            'description' => 'nullable|string', // La description est facultative et doit être composé d'une chaîne de caractères
            'verifie' => 'nullable|integer', // La verifie est facultative et doit être un nombre
            'visibilite' => 'nullable|string', // La visibilite est facultative et doit être composé d'une chaîne de caractères
            'sauvegardes' => 'nullable|integer', // La sauvegardes est facultative et doit être un nombre
        ]);

        // Vérifier si la validation a échoué
        if ($donnees === null) {
            return response()->json(['message' => 'Les données soumises ne sont pas valides.'], 405);
        }


        // On modifie la liste en utilisant les données validées
        $liste->update([
            'titre' => $donnees['titre'],
            'type' => $donnees['type'],
            'soustitre' => $donnees['soustitre'] ?? null,
            'image' => $donnees['image'] ?? null,
            'description' => $donnees['description'] ?? null,
            'verifie' => $donnees['verifie'] ?? 0,
            'visibilite' => $donnees['visibilite'] ?? 'privée',
            'sauvegardes' => $donnees['sauvegardes'] ?? 0,
        ]);

        // On retourne la liste mis à jour au format JSON
        return response()->json($liste, 200);
    }


    //--- Méthode pour supprimer une liste ---//
    public function supprimerListe($listeId)
    {
        // On cherche la liste a partir de son ID
        $liste = Liste::find($listeId);

        // On supprime la liste
        $liste->delete();

        // On retourne un message de confirmation 204
        return response()->json(null, 204);
    }


    //--- Méthode pour afficher les chansons d'une liste selon son ID ---//
    public function chansonsListe($listeId)
    {
        $liste = Liste::find($listeId);
        $chansons = $liste->chansons;
        return response()->json($chansons);
    }
}

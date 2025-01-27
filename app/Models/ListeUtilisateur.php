<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListeUtilisateur extends Model
{
    protected $table = 'listes_utilisateurs';

    protected $fillable = [
        'liste_id',
        'utilisateur_id',
        'ordre',
    ];

    public function liste(): BelongsTo
    {
        return $this->belongsTo(Liste::class);
    }

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class);
    }

    // You can add custom methods or accessors here
    // For example, you could add a method to update the ordre attribute
    public function updateOrdre(int $newOrdre): void
    {
        $this->ordre = $newOrdre;
        $this->save();
    }
}

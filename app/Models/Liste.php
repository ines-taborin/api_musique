<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Liste extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'titre',
        'soustitre',
        'image',
        'description',
        'type',
        'verifie',
        'sauvegardes',
        'visibilite',
    ];

    public function utilisateurs()
    {
        return $this->belongsToMany(Utilisateur::class, 'listes_utilisateurs');
    }

    public function chansons(): BelongsToMany
    {
        return $this->belongsToMany(Chanson::class, 'listes_chansons');
    }
}

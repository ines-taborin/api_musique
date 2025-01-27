<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chanson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'titre',
        'artiste_id',
        'paroles',
        'album',
        'datePublication',
        'duree',
        'lectures',
    ];

    public function listes(): BelongsToMany
    {
        return $this->belongsToMany(Liste::class)->using(ListeChanson::class);
    }

    public function artiste(): BelongsTo
    {
        return $this->belongsTo(Artiste::class);
    }
}

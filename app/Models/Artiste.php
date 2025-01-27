<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artiste extends Model
{
    use HasFactory;

    protected $table = 'artistes';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom',
        'image',
        'bio',
        'abonnes',
        'verifie',
    ];

    public function chansons(): HasMany
    {
        return $this->hasMany(Chanson::class);
    }
}
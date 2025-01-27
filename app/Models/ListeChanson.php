<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListeChanson extends Model
{
    protected $table = 'listes_chansons';

    public $timestamps = false;

    protected $fillable = [
        'liste_id',
        'chanson_id',
        'ordre',
    ];

    public function liste(): BelongsTo
    {
        return $this->belongsTo(Liste::class);
    }

    public function chanson(): BelongsTo
    {
        return $this->belongsTo(Chanson::class);
    }
}

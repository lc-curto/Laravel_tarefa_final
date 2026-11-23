<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['band_id', 'name', 'image', 'release_date'])]
class Album extends Model
{
    public function band(): BelongsTo
    {
        $band = Band::class;

        return $this->belongsTo($band);
    }
}

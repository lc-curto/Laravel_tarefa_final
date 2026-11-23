<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'image'])]

class Band extends Model
{
    public function albums(): HasMany
    {
        $album = Album::class;

        return $this->hasMany($album);
    }
}

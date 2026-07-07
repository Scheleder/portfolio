<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipImage extends Model
{
    protected $fillable = [
        'tip_id',
        'image_path',
        'caption',
        'order',
    ];

    public function tip(): BelongsTo
    {
        return $this->belongsTo(Tip::class);
    }
}

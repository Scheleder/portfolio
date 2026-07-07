<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tip extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'subcategory_id',
        'user_id',
        'title',
        'slug',
        'content',
        'type',
        'tags',
        'is_public',
        'view_count',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_public' => 'boolean',
        'view_count' => 'integer',
    ];

    protected static function booted()
    {
        static::creating(function ($tip) {
            if (empty($tip->slug)) {
                $tip->slug = static::generateUniqueSlug($tip->title);
            }
        });

        static::updating(function ($tip) {
            if ($tip->isDirty('title')) {
                $tip->slug = static::generateUniqueSlug($tip->title, $tip->id);
            }
        });
    }

    protected static function generateUniqueSlug(string $title, ?int $excludeId = null): string
    {
        $slug = str($title)->slug()->toString();
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->when($excludeId, fn ($q) => $q->where('id', '!=', $excludeId))->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(TipImage::class)->orderBy('order');
    }
}

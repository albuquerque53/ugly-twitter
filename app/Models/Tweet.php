<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function hasLike(): bool
    {
        if (! auth()->check()) {
            throw new Exception('Could not find logged user');
        }

        $currentUser = auth()->user();

        return $this->likes()
            ->where('user_id', $currentUser->id)
            ->exists();
    }
}

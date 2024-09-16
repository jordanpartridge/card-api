<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'rank',
        'suit_id',
    ];

    public function suit(): BelongsTo
    {
        return $this->belongsTo(Suit::class);
    }

    public function scopeStandardCards(Builder $builder): Builder
    {
        return $builder->where('rank', '!=', 'Joker');
    }
}

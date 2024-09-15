<?php

namespace App\Models;

use App\Observers\DeckObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ObservedBy([DeckObserver::class])]

class Deck extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'jokers',
    ];

    public function cards(): BelongsToMany
    {
        return $this->belongsToMany(Card::class);
    }

    public function initialize(): void
    {
        // Attach all non-joker cards
        $standardCards = Card::standardCards()->get();
        $this->cards()->attach($standardCards);

        // Attach jokers if needed
        if ($this->jokers > 0) {
            $jokerCard = Card::where('rank', 'joker')->first();
            if ($jokerCard) {
                $jokerAttachments = array_fill(0, $this->jokers, ['card_id' => $jokerCard->id]);
                $this->cards()->attach($jokerAttachments);
            }
        }
    }
}

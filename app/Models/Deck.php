<?php

namespace App\Models;

use App\Observers\DeckObserver;
use Glhd\Bits\Database\HasSnowflakes;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([DeckObserver::class])]
class Deck extends Model
{
    use HasFactory;
    use HasSnowflakes;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'jokers',
    ];

    /**
     * route identifier is no slug
     * example: /v1/decks/my-deck
     * instead of /v1/decks/1
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function cards(): BelongsToMany
    {
        return $this->belongsToMany(Card::class)->withPivot('sequence')
            ->withTimestamps()
            ->orderBy('sequence');
    }

    public function initialize(): void
    {
        // Attach all non-joker cards
        $standardCards = Card::standardCards()->get();

        $cardData = $standardCards->mapWithKeys(function ($card, $index) {
            return [$card->id => ['sequence' => $index + 1]];
        })->all();
        $this->cards()->attach($cardData);

        // Attach jokers if needed
        if ($this->jokers > 0) {
            $jokerCard = Card::where('rank', 'Joker')->first();
            if ($jokerCard) {
                $lastOrder = $standardCards->count();
                $jokerAttachments = collect(range(1, $this->jokers))->mapWithKeys(function ($i) use ($jokerCard, $lastOrder) {
                    return [$jokerCard->id => ['sequence' => $lastOrder + $i]];
                })->all();
                $this->cards()->attach($jokerAttachments);
            }
        }
        $this->shuffle(5);
    }

    public function draw(int $count = 1): Collection
    {
        $cards = $this->cards()->take($count)->get();
        $this->cards()->detach($cards);

        return $cards;
    }

    public function shuffle(int $times = 1): void
    {
        for ($i = 0; $i < $times; $i++) {

            $cards = $this->cards()->get();
            $shuffledOrder = $cards->shuffle()->values()->all();

            $this->cards()->sync(
                $cards->mapWithKeys(function ($card, $index) use ($shuffledOrder) {
                    return [$shuffledOrder[$index]->id => ['sequence' => $index + 1]];
                })
            );
        }
    }
}

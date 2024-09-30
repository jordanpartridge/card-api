<?php

namespace App\Events;

use App\Enum\Rank;
use App\Enum\Suit as SuitEnum;
use App\Models\Card;
use App\Models\Suit;
use App\States\CardState;
use Thunk\Verbs\Attributes\Autodiscovery\StateId;
use Thunk\Verbs\Event;

class CardCreated extends Event
{
    #[StateId(CardState::class)]
    public ?int $card_id = null;

    public Rank $rank;

    public ?SuitEnum $suit = null;

    public function applyToCard(CardState $card): void
    {
        $card->rank = $this->rank;
        $card->suit = $this->suit;

    }

    public function handle(): void
    {
        $suit = Suit::where(['name' => $this->suit])->first();
        Card::create([
            'rank' => $this->rank,
            'suit_id' => $suit->id ?? null,
        ]);
    }
}

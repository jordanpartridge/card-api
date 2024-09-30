<?php

namespace App\Events;

use App\Models\Suit;
use App\States\SuitState;
use Thunk\Verbs\Attributes\Autodiscovery\StateId;
use Thunk\Verbs\Event;

class SuitCreated extends Event
{
    #[StateId(SuitState::class)]
    public ?int $suit_id = null;

    public string $name;

    public string $symbol;

    public string $color;

    public function applyToSuit(SuitState $suit): void
    {
        $suit->name = $this->name;
        $suit->symbol = $this->symbol;
        $suit->color = $this->color;
    }

    public function handle(): void
    {
        Suit::create([
            'name' => $this->name,
            'symbol' => $this->symbol,
            'color' => $this->color,
        ]);
    }
}

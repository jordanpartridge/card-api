<?php

namespace App\States;

use App\Enum\Rank;
use App\Enum\Suit;
use Thunk\Verbs\State;

class CardState extends State
{
    public Rank $rank;

    public ?Suit $suit = null;
}

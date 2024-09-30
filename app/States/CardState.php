<?php

namespace App\States;

use App\Enum\Rank;
use Thunk\Verbs\State;

class CardState extends State
{
    public Rank $rank;

    public string $suit;
}

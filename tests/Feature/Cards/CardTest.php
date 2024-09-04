<?php

use App\Models\Card;

it('can be created with factory', function () {
    $card = Card::factory()->create();
    expect($card->rank)->not->toBeNull()
        ->and($card->suit)->not->toBeNull();
});

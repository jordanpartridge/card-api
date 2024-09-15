<?php

use App\Models\Deck;

it('can be created with factory', function () {
    $deck = Deck::factory()->create();
    expect($deck->id)->not->toBeNull()
        ->and($deck->deleted_at)->toBeNull();
});

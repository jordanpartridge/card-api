<?php

use App\Models\Suit;

it('can be created with factory', function () {
    $suit = Suit::factory()->create();
    expect($suit->name)->not->toBeNull()
        ->and($suit->symbol)->not->toBeNull()
        ->and($suit->color)->not->toBeNull()
        ->and($suit->deleted_at)->toBeNull();
});

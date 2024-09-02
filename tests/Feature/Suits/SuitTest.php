<?php

use App\Models\Suit;

it('can be created with factory', function () {
    $suit = Suit::factory()->create();
    expect($suit->name)->not->toBeNull();
    expect($suit->Symbol)->not->toBeNull();
    expect($suit->color)->not->toBeNull();
    expect($suit->deleted_at)->toBeNull();
});

<?php

use App\Models\Card;
use App\Models\Suit;

it('can be soft deleted and restored', function () {
    $card = Card::factory()->create();
    $card->delete();
    expect($card->trashed())->toBeTrue();

    $card->restore();
    expect($card->trashed())->toBeFalse();
});

it('allows mass assignment of rank and suit_id', function () {
    $suit = Suit::factory()->create();
    $card = Card::create(['rank' => 5, 'suit_id' => $suit->id]);

    expect($card->rank)->toBe(5)
        ->and($card->suit_id)->toBe($suit->id);
});

it('has a valid suit relationship', function () {
    $suit = Suit::factory()->create();
    $card = Card::factory()->create(['suit_id' => $suit->id]);

    expect($card->suit->id)->toBe($suit->id);
});

it('can create a Joker card with null suit', function () {
    $card = Card::factory()->create(['rank' => 'Joker', 'suit_id' => null]);

    expect($card->rank)->toBe('Joker')
        ->and($card->suit_id)->toBeNull();
});

it('throws an error for invalid rank or suit_id', function () {
    $this->expectException(\Illuminate\Database\QueryException::class);
    Card::factory()->create(['rank' => 'InvalidRank', 'suit_id' => 999]);
});

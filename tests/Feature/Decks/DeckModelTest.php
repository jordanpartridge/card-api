<?php

use App\Models\Deck;
use Illuminate\Database\QueryException;

it('can be created with factory', function () {
    $deck = Deck::factory()->create();
    expect($deck->id)->not->toBeNull()
        ->and($deck->deleted_at)->toBeNull();
});

it('must have a unique name', function () {
    // Create the first deck
    $deck1 = Deck::factory()->create(['name' => 'Unique Deck Name']);

    // Attempt to create a second deck with the same name
    $createDuplicateDeck = fn () => Deck::factory()->create(['name' => 'Unique Deck Name']);

    // Assert that creating a duplicate deck throws an exception
    expect($createDuplicateDeck)->toThrow(QueryException::class)
        ->and(Deck::where('name', 'Unique Deck Name')->count())->toBe(1);

    // Verify that only one deck with this name exists in the database
});

it('allows creation of decks with different names', function () {
    $deck1 = Deck::factory()->create(['name' => 'First Deck']);
    $deck2 = Deck::factory()->create(['name' => 'Second Deck']);

    expect(Deck::count())->toBe(2);
});

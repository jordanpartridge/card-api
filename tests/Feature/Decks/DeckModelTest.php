<?php

use App\Models\Deck;
use Database\Seeders\CardSeeder;
use Database\Seeders\SuitSeeder;
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

    expect($createDuplicateDeck)->toThrow(QueryException::class)
        ->and(Deck::where('name', 'Unique Deck Name')->count())->toBe(1);

});

it('does not have jokers by default', function () {
    $this->seed(SuitSeeder::class);
    $this->seed(CardSeeder::class);
    $deck = Deck::factory()->create();
    expect($deck->jokers)->toBe(0);
});

it('can have up to 2 jokers', function () {
    $this->seed(SuitSeeder::class);
    $this->seed(CardSeeder::class);
    $deck = Deck::factory()->create(['jokers' => 2]);
    expect($deck->jokers)->toBe(2);
});

it('has 52 cards by default', function () {
    $this->seed(SuitSeeder::class);
    $this->seed(CardSeeder::class);
    $deck = Deck::factory()->create();
    expect($deck->cards->count())->toBe(52);
});

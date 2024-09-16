<?php

use App\Models\Deck;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    Sanctum::actingAs(User::factory()->create());
});

it('has a valid show endpoint', function () {
    $deck = Deck::factory()->create();
    $response = $this->getJson('/v1/decks/' . $deck->id);
    $response->assertStatus(200);
});

it('can be created over api', function () {

    $response = $this->postJson('/v1/decks', [
        'name' => 'My Deck',
    ]);
    $response->assertStatus(201);
    $this->assertDatabaseHas('decks', [
        'name' => 'My Deck',
    ]);
});

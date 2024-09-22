<?php

use App\Models\Card;
use App\Models\User;
use Database\Seeders\CardSeeder;
use Database\Seeders\SuitSeeder;
use Laravel\Sanctum\Sanctum;

beforeEach(function () {
    Sanctum::actingAs(User::factory()->create());
});

it('can visit index', function () {
    $response = $this->getJson('/v1/cards');
    $response->assertJsonStructure([
        'data' => [
            '*' => ['id', 'rank', 'suit'],
        ],
    ]);
    $response->assertStatus(200);
});

it('can visit show', function () {
    $card = Card::factory()->create();
    $response = $this->getJson('/v1/cards/' . $card->id);
    $response->assertJson(['rank' => $card->rank, 'suit' => ['name' => $card->suit->name, 'symbol' => $card->suit->symbol, 'color' => $card->suit->color]]);
    $response->assertStatus(200);
});

it('paginates results', function () {
    $this->seed(SuitSeeder::class);
    $this->seed(CardSeeder::class);
    $response = $this->getJson('/v1/cards');
    $response->assertStatus(200);
    $response->assertJsonCount(15, 'data');
});

it('can visit suits', function () {
    $response = $this->getJson('/v1/suits');
    $response->assertStatus(200);
});

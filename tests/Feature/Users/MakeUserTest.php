<?php

use App\Models\User;

use function Pest\Laravel\artisan;

test('make:user command creates a new user', function () {
    artisan('make:user')
        ->expectsQuestion('👤 What is the name of the user?', 'John Doe')
        ->expectsQuestion('📧 What is the email of the user?', 'john@example.com')
        ->assertSuccessful();

    $user = User::where('email', 'john@example.com')->first();
    expect($user)->not->toBeNull()
        ->and($user->name)->toBe('John Doe')
        ->and($user->tokens)->toHaveCount(1);
});

it('validates name input', function () {
    artisan('make:user')
        ->expectsQuestion('👤 What is the name of the user?', '')
        ->assertFailed();

    expect(User::query()->count())->toBe(0);
});

it('validates email input', function () {
    artisan('make:user')
        ->expectsQuestion('👤 What is the name of the user?', 'Jane Doe')
        ->expectsQuestion('📧 What is the email of the user?', 'bannana')
        ->assertFailed();
});

<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\artisan;

test('make:user command creates a new user', function () {
    artisan('make:user')
        ->expectsQuestion('What is the name of the user?', 'John Doe')
        ->expectsQuestion('What is the email of the user?', 'john@example.com')
        ->expectsQuestion('What is the password of the user?', 'password123')
        ->expectsQuestion('Would you like to generate an API token for the user?', 'yes')
        ->expectsQuestion('enter a name for the API token', 'token123')
        ->assertSuccessful()
        ->expectsOutput('User created successfully');

    $user = User::where('email', 'john@example.com')->first();

    expect($user)->not->toBeNull()
        ->and($user->name)->toBe('John Doe')
        ->and(Hash::check('password123', $user->password))->toBeTrue()
        ->and($user->tokens)->toHaveCount(1);
});

test('make:user command does not create API token when not requested', function () {
    artisan('make:user')
        ->expectsQuestion('What is the name of the user?', 'Jane Doe')
        ->expectsQuestion('What is the email of the user?', 'jane@example.com')
        ->expectsQuestion('What is the password of the user?', 'password456')
        ->expectsQuestion('Would you like to generate an API token for the user?', false)
        ->assertSuccessful()
        ->expectsOutput('User created successfully')
        ->doesntExpectOutput('Token');

    $user = User::where('email', 'jane@example.com')->first();

    expect($user)->not->toBeNull()
        ->and($user->tokens)->toHaveCount(0);
});

it('validates name input', function () {
    artisan('make:user')
        ->expectsQuestion('What is the name of the user?', '')->assertFailed();

    expect(User::query()
        ->count())->toBe(0);
});

it('validates email input', function () {
    artisan('make:user')
        ->expectsQuestion('What is the name of the user?', 'Jane Doe')
        ->expectsQuestion('What is the email of the user?', 'bannana')->assertFailed();
});

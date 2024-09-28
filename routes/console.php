<?php

use App\Actions\CreateUser;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

use function Laravel\Prompts\info;
use function Laravel\Prompts\spin;
use function Laravel\Prompts\text;

Schedule::command('decks:clean')->daily();
Artisan::command('make:user', function () {
    info('🚀 Welcome to the User Creation Wizard! 🚀');

    $name = text(
        label: '👤 What is the name of the user?',
        placeholder: 'Jordan Partridge',
        validate: fn ($value) => match (true) {
            strlen($value) < 2 => 'The name must be at least 2 characters long.',
            strlen($value) > 255 => 'The name must not exceed 255 characters.',
            default => null,
        }
    );

    $email = text(
        label: '📧 What is the email of the user?',
        placeholder: 'jordan@partridge.rocks',
        validate: fn ($value) => match (true) {
            ! filter_var($value, FILTER_VALIDATE_EMAIL) => 'Please enter a valid email address.',
            User::where('email', $value)->exists() => 'This email is already in use.',
            default => null,
        }
    );

    $userAction = spin(fn () => new CreateUser(['name' => $name, 'email' => $email]), 'Creating user...');

    $user = $userAction->getUser();
    $token = $user->createToken('token-generated-by-make-user')->plainTextToken;

    info('✅ User created successfully! Guess what? You get a free API token!');
    info($token);

    info('🔐 Make sure to save the API token, as it won\'t be shown again!');
});

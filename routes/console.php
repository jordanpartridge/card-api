<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\text;

Artisan::command('make:user', function () {
    $name = text(
        label: 'What is the name of the user?',
        placeholder: 'Jordan Partridge', validate: ['required', 'max:255', 'min:2']
    );

    $email = text(
        label: 'What is the email of the user?',
        placeholder: 'jordan@partridge.rocks', validate: ['required', 'email', 'unique:users,email']
    );

    $apiToken = confirm('Would you like to generate an API token for the user?');

    $user = User::create([
        'name' => $name,
        'email' => $email,
        'password' => Str::uuid(),
    ]);

    if ($apiToken) {
        $tokenName = text('enter a name for the API token');
        $token = $user->createToken($tokenName)->plainTextToken;
        $this->info($token);
    }

    $this->info('User created successfully');

});

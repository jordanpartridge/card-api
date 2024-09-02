<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('make:user', function () {
    $name = text(
        label: 'What is the name of the user?',
        placeholder: 'Jordan Partridge', validate: ['required', 'max:255', 'min:2']
    );

    $email = text(
        label: 'What is the email of the user?',
        placeholder: 'jordan@partridge.rocks', validate: ['required', 'email', 'unique:users,email']
    );

    $password = password(
        label: 'What is the password of the user?',
        placeholder: 'SuperSecret', validate: ['required', Password::defaults()]
    );

    $apiToken = confirm('Would you like to generate an API token for the user?');

    $user = User::create([
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ]);

    if ($apiToken) {
        $tokenName = text('enter a name for the API token');
        $token = $user->createToken($tokenName)->plainTextToken;
        $this->info($token);
    }

    $this->info('User created successfully');

});

<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

final class CreateUser
{
    private User $user;

    public function __construct(array $data)
    {
        $validated = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ])->validate();

        $this->user = User::factory()->create(
            $validated,
        );
    }

    public function getUser(): User
    {
        return $this->user;
    }
}

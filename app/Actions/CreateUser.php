<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

final class CreateUser
{
    private static array $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    ];

    private User $user;

    public function __construct(array $data)
    {
        $this->user = $this->create($this->validate($data));
    }

    public function getUser(): User
    {
        return $this->user;
    }

    private function create(array $data): User
    {
        return User::factory()->create($data);
    }

    private function validate(array $data): array
    {
        return Validator::make($data, CreateUser::$rules)->validate();
    }
}

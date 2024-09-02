<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class IndexController
{
    public function __invoke(): Collection
    {
        return User::all();
    }
}

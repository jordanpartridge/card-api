<?php

use App\Models\User;

it('can be created with factory', function () {
    $user = User::factory()->create();
    expect($user->name)->not->toBeNull();
});

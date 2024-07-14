<?php

namespace App\Policies;

use App\Models\ApiKey;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApiKeyPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, ApiKey $apiKey)
    {
        return $user->id === $apiKey->user_id;
    }
}

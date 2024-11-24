<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Recette;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecettePolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function before(User $user): ?bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }

        return null;
    }

    public function create(User $user): bool
    {
        return $user !== null;
    }

    public function update(User $user, Recette $recette): bool
    {
        return $user->id === $recette->user_id;
    }

    public function delete(User $user): bool
    {
        return $user->role === Role::ADMIN;
    }
}

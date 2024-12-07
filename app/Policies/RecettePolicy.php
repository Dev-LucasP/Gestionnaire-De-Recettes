<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Recette;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class RecettePolicy
 *
 * This policy class handles the authorization logic for the Recette model.
 *
 * @package App\Policies
 */
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

    /**
     * Handle all checks before any other authorization methods.
     *
     * @param User $user The user instance.
     * @return bool|null True if the user is an admin, null otherwise.
     */
    public function before(User $user): ?bool
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can update the recette.
     *
     * @param User $user The user instance.
     * @param Recette $recette The recette instance.
     * @return bool True if the user owns the recette, false otherwise.
     */
    public function update(User $user, Recette $recette): bool
    {
        return $user->id === $recette->user_id;
    }

    /**
     * Determine whether the user can delete the recette.
     *
     * @param User $user The user instance.
     * @param Recette $recette The recette instance.
     * @return bool True if the user owns the recette, false otherwise.
     */
    public function delete(User $user, Recette $recette): bool
    {
        return $user->id === $recette->user_id;
    }
}

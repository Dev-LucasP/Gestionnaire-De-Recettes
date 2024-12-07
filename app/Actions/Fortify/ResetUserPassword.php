<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

/**
 * Class ResetUserPassword
 *
 * This class handles the resetting of a user's forgotten password.
 */
class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param User $user The user whose password is being reset.
     * @param array<string, string> $input The input data for resetting the password.
     * @return void
     */
    public function reset(User $user, array $input): void
    {
        // Validate the input data
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();

        // Reset the user's password and save the changes
        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}

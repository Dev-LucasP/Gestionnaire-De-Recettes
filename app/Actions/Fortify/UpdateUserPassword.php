<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

/**
 * Class UpdateUserPassword
 *
 * This class handles the updating of a user's password.
 */
class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param User $user The user whose password is being updated.
     * @param array<string, string> $input The input data for updating the password.
     * @return void
     */
    public function update(User $user, array $input): void
    {
        // Validate the input data
        Validator::make($input, [
            'current_password' => ['required', 'string', 'current_password:web'],
            'password' => $this->passwordRules(),
        ], [
            'current_password.current_password' => __('The provided password does not match your current password.'),
        ])->validateWithBag('updatePassword');

        // Update the user's password and save the changes
        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}

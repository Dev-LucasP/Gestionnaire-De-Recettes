<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

/**
 * Class UpdateUserProfileInformation
 *
 * This class handles the updating of a user's profile information.
 */
class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param User $user The user whose profile information is being updated.
     * @param array<string, string> $input The input data for updating the profile information.
     * @return void
     */
    public function update(User $user, array $input): void
    {
        // Validate the input data
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        // Check if the email has changed and if the user must verify the email
        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            // Update the user's profile information
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param User $user The verified user whose profile information is being updated.
     * @param array<string, string> $input The input data for updating the profile information.
     * @return void
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        // Update the user's profile information and set email_verified_at to null
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        // Send email verification notification
        $user->sendEmailVerificationNotification();
    }
}

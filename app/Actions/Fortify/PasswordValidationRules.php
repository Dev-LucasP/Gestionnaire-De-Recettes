<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

/**
 * Trait PasswordValidationRules
 *
 * Provides the validation rules for passwords.
 */
trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array<mixed>|string> The array of password validation rules.
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', Password::default(), 'confirmed'];
    }
}

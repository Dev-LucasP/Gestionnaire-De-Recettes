<?php

namespace App\Enums;

/**
 * Enum Role
 *
 * This enum represents the different roles a user can have.
 */
enum Role: string {
    /**
     * Represents an admin user.
     */
    case ADMIN = 'admin';

    /**
     * Represents a regular user.
     */
    case USER = 'user';

    /**
     * Represents a visitor user.
     */
    case VISITEUR = 'visiteur';
}

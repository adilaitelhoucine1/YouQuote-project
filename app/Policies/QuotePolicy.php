<?php

namespace App\Policies;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotePolicy
{
    /**
     * Determine if the user can update the quote.
     */
    public function update(User $user, Quote $quote)
    {
        return $user->id === $quote->user_id;
    }

    /**
     * Determine if the user can delete the quote.
     */
    public function delete(User $user, Quote $quote)
    {
        return $user->id === $quote->user_id;
    }
}


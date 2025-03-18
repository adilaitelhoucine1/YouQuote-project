<?php

namespace App\Policies;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuotePolicy
{
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    // Vérifie si l'utilisateur est le propriétaire de la citation
    public function update(User $user, Quote $quote)
    {
        return $user->id === $quote->user_id;
    }

    public function delete(User $user, Quote $quote)
    {
        return $user->id === $quote->user_id;
    }
}

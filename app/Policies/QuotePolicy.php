<?php

namespace App\Policies;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotePolicy
{
    use HandlesAuthorization;

    
    public function update(User $user, Quote $quote): bool
    {
        return $user->id === $quote->user_id || $user->role =="admin";
    }

    
    public function delete(User $user, Quote $quote): bool
    {
        return $user->id === $quote->user_id ||  $user->role =="admin";
    }

    public function view(User $user, Quote $quote): bool
    {
        return $user->id === $quote->user_id ||  $user->role =="admin";
    }

   
    public function create(User $user): bool
    {
        return true; 
    }
}


<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Quote;
use App\Policies\QuotePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Quote::class => QuotePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-quote', function (User $user, Quote $quote) {
            return $user->id === $quote->user_id;
        });

    }
}

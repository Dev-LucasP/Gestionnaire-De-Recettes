<?php

namespace App\Providers;

use App\Enums\Role;
use App\Models\Recette;
use App\Models\SuiviExecution;
use App\Policies\RecettePolicy;
use App\Policies\SuiviExecutionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Recette::class => RecettePolicy::class,
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user) {
            if ($user->role === Role::ADMIN) {
                return true;
            }
        });
    }
}

<?php

namespace App\Providers;

use App\Enums\Role;
use App\Models\Recette;
use App\Models\SuiviExecution;
use App\Policies\RecettePolicy;
use App\Policies\SuiviExecutionPolicy;
use App\Repositories\IIngredientRepository;
use App\Repositories\IngredientRepository;
use App\Repositories\IRecetteRepository;
use App\Repositories\RecetteRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * This service provider is responsible for binding interfaces to implementations
 * and registering policies and gates for the application.
 *
 * @package App\Providers
 */
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
     * Register any application services.
     *
     * This method binds interfaces to their respective implementations.
     */
    public function register()
    {
        $this->app->bind(IRecetteRepository::class, RecetteRepository::class);
        $this->app->bind(IIngredientRepository::class, IngredientRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * This method registers policies and defines a gate that grants all permissions to admin users.
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

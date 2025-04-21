<?php

namespace App\Providers;

use App\Models\MealPlan;
use App\Policies\MealPlanPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        MealPlan::class => MealPlanPolicy::class,
        // Add other model/policy mappings here if needed
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}   
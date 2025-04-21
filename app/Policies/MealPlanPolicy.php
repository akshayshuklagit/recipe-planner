<?php

namespace App\Policies;

use App\Models\MealPlan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealPlanPolicy
{
    use HandlesAuthorization;

    public function view(User $user, MealPlan $meal_plan)
    {
        return $user->id === $meal_plan->user_id;
    }

    public function create(User $user)
    {
        return true; // All authenticated users can create meal plans
    }

    public function update(User $user, MealPlan $meal_plan)
    {
        return $user->id === $meal_plan->user_id;
    }

    public function delete(User $user, MealPlan $meal_plan)
    {
        return $user->id === $meal_plan->user_id;
    }
}
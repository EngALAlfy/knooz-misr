<?php

namespace App\Policies;

use App\Models\ShipPolicy;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShipPolicyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        return $user->role == "full_admin" || $user->role == "admin" || $user->role == "shipper";

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShipPolicy  $shipPolicy
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ShipPolicy $shipPolicy)
    {
        //
        return $user->role == "full_admin" || $user->role == "admin" || $user->role == "shipper";

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return $user->role == "full_admin" || $user->role == "admin" || $user->role == "shipper";

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShipPolicy  $shipPolicy
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ShipPolicy $shipPolicy)
    {
        //
        return $user->role == "full_admin" || $user->role == "admin" || $user->role == "shipper";

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShipPolicy  $shipPolicy
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        //
        return $user->role == "full_admin" || $user->role == "admin" || $user->role == "shipper";

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShipPolicy  $shipPolicy
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ShipPolicy $shipPolicy)
    {
        //
        return $user->role == "full_admin" || $user->role == "admin" || $user->role == "shipper";

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShipPolicy  $shipPolicy
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ShipPolicy $shipPolicy)
    {
        //
        return $user->role == "full_admin" || $user->role == "admin" || $user->role == "shipper";

    }
}

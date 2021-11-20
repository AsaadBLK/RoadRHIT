<?php

namespace App\Policies;

use App\Models\Materiel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaterielPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user, Materiel $materiel)
    {
        //return true;
        return auth()->user()->current_team_id == 1 ? true : false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiel  $materiel
     * @return mixed
     */
    public function view(User $user, Materiel $materiel)
    {
        //return $user->belongsToMateriel($materiel);
        return auth()->user()->current_team_id == 1 ? true : false;

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user, Materiel $materiel)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiel  $materiel
     * @return mixed
     */
    public function update(User $user, Materiel $materiel)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
        //return $user->ownsMateriel($materiel);
    }

    /**
     * Determine whether the user can add team members.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiel  $materiel
     * @return mixed
     */
    public function addMaterielMember(User $user, Materiel $materiel)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
        //return $user->ownsMateriel($materiel);
    }

    /**
     * Determine whether the user can update team member permissions.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiel  $materiel
     * @return mixed
     */
    public function updateMaterielMember(User $user, Materiel $materiel)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
        //return $user->ownsMateriel($materiel);
    }

    /**
     * Determine whether the user can remove team members.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiel  $materiel
     * @return mixed
     */
    public function removeMaterielMember(User $user, Materiel $materiel)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
        //return $user->ownsMateriel($materiel);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Materiel  $materiel
     * @return mixed
     */
    public function delete(User $user, Materiel $materiel)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
        //return $user->ownsMateriel($materiel);
    }
}

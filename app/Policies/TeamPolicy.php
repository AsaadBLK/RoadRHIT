<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user, Team $team)
    {
        //return true;
        // $user->hasTeamRole($team, "admin");
        //$user->belongsToTeam("admin");
        return auth()->user()->current_team_id == 1 ? true : false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Team  $team
     * @return mixed
     */
    public function view(User $user, Team $team)
    {
        //return $user->belongsToTeam($team);
        return auth()->user()->current_team_id == 1 ? true : false;

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user, Team $team)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Team  $team
     * @return mixed
     */
    public function update(User $user, Team $team)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
        //return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can add team members.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Team  $team
     * @return mixed
     */
    public function addTeamMember(User $user, Team $team)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
        //return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can update team member permissions.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Team  $team
     * @return mixed
     */
    public function updateTeamMember(User $user, Team $team)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
        //return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can remove team members.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Team  $team
     * @return mixed
     */
    public function removeTeamMember(User $user, Team $team)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
        //return $user->ownsTeam($team);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Team  $team
     * @return mixed
     */
    public function delete(User $user, Team $team)
    {
        return auth()->user()->current_team_id == 1 ? true : false;
        //return $user->ownsTeam($team);
    }
}

<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return $user->role->name == 'admin';
    }

    public function view(User $user, Role $role)
    {
        return $user->role->name == 'admin';
    }

    public function create(User $user)
    {
        return $user->role->name == 'admin';
    }

    public function update(User $user, Role $role)
    {
        return $user->role->name == 'admin';
    }

    public function delete(User $user, Role $role)
    {
        return $user->role->name == 'admin';
    }

    public function restore(User $user, Role $role)
    {
        return $user->role->name == 'admin';
    }

//    public function forceDelete(User $user, Role $role)
//    {
//        //
//    }
}

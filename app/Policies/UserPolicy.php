<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function editUser(User $user)
    {
        return $user->role->name == 'admin';
    }

    public function update(User $user, User $model)
    {
        return $user->role->name == 'admin';
    }

    public function delete(User $user, User $model)
    {
        return $user->role->name == 'admin';
    }

    public function restore(User $user, User $model)
    {
        return $user->role->name == 'admin';
    }

//    public function forceDelete(User $user, User $model)
//    {
//        //
//    }
}

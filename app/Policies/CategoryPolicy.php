<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    public function viewAny(User $user)
    {
        return $user->role->name != 'user';
    }

    public function view(User $user, Category $category)
    {
        return $user->role->name != 'user';
    }

    public function create(User $user)
    {
        return $user->role->name == 'moderator';
    }

    public function update(User $user, Category $category)
    {
        return $user->role->name == 'moderator';
    }

    public function delete(User $user, Category $category)
    {
        return $user->role->name == 'moderator';
    }

//    public function restore(User $user, Category $category)
//    {
//        return $user->role->name == 'moderator';
//    }

//    public function forceDelete(User $user, Category $category)
//    {
//        //
//    }
}

<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;


    public function viewTrash(User $user)
    {
        return $user->role->name == 'moderator';
    }

    public function editFavourites(User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role->name == 'moderator';
    }

    public function update(User $user, Book $book)
    {
        return $user->role->name == 'moderator';
    }

    public function delete(User $user, Book $book)
    {
        return ($user->role->name == 'moderator');
    }

    public function restore(User $user, Book $book)
    {
        return ($user->role->name == 'moderator');
    }

    public function forceDelete(User $user, Book $book)
    {
        return ($user->role->name == 'moderator');
    }
}

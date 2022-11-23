<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedbackPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role->name == 'moderator';
    }

    public function view(User $user, Feedback $feedback)
    {
        return $user->role->name == 'moderator';
    }

    public function create(User $user)
    {
        return $user->role->name == 'user';
    }


    public function delete(User $user, Feedback $feedback)
    {
        return $user->role->name == 'moderator';
    }

}
